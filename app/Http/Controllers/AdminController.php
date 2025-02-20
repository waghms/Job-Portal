<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Application;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    /**
     * Handle the registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin registered successfully!');
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle the login authentication request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    /**
     * Handle the admin logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login'); // Redirect to login page after logout
    }

    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.edit', compact('admin'));
    }

    /**
     * Handle the profile update.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id, // Ensure the email is unique except for the current admin
        ]);

        // Only update name and email, if password is provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully!');
    }
    
    public function dashboard(Request $request)
    {
        // Get the status filter from the request, default to null (for all applications)
        $statusFilter = $request->get('status', null);

        // Fetch applications based on the status filter
        $applicationsQuery = Application::with('job');

        if ($statusFilter) {
            // Filter applications by status if it's selected
            $applicationsQuery->where('status', $statusFilter);
        }

        // Fetch paginated applications with related job data
        $applications = $applicationsQuery->paginate(10);

        // Count total applications and categorized statuses
        $totalApplications = Application::count();
        $shortlistedCount = Application::where('status', 'Shortlisted')->count();
        $pendingCount = Application::where('status', 'Pending')->count();
        $rejectedCount = Application::where('status', 'Rejected')->count();
        $selectedCount = Application::where('status', 'Selected')->count();
        $onHoldCount = Application::where('status', 'On_Hold')->count();
        $closedCount = Application::where('status', 'Closed')->count();

        // Monthwise data (Total, Selected, Rejected, Pending)
        $monthwiseData = Application::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN status = "Selected" THEN 1 ELSE 0 END) as selected'),
            DB::raw('SUM(CASE WHEN status = "Rejected" THEN 1 ELSE 0 END) as rejected'),
            DB::raw('SUM(CASE WHEN status = "Pending" THEN 1 ELSE 0 END) as pending')
        )
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy(DB::raw('MONTH(created_at)'))
        ->get();

        // Ensure that monthwiseData contains all 12 months, even if a month has no data
        $monthwiseData = $monthwiseData->keyBy('month')->toArray();
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($monthwiseData[$i])) {
                // If a month is missing, fill it with zero values
                $monthwiseData[$i] = [
                    'month' => $i,
                    'total' => 0,
                    'selected' => 0,
                    'rejected' => 0,
                    'pending' => 0,
                ];
            }
        }
        ksort($monthwiseData); // Ensure months are in the correct order

        // Return the data to the view
        return view('admin.dashboard', compact(
            'applications', 
            'totalApplications', 
            'shortlistedCount', 
            'pendingCount', 
            'rejectedCount',
            'selectedCount',
            'onHoldCount',
            'closedCount',
            'monthwiseData' // Pass the month-wise data
        ));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:Pending,Shortlisted,Rejected,Selected,On_Hold,Closed'
        ]);

        // Find the application by ID
        $application = Application::find($id);

        if (!$application) {
            return redirect()->back()->with('error', 'Application not found.');
        }

        // Update status
        $application->status = $request->status;
        $application->save();

        return redirect()->route('admin.applications.index')->with('success', 'Application status updated successfully.');
    }
    //Dashboard Fetch Applications
    public function listApplications(Request $request)
    {
        // Get the search query from the request (if any)
        $search = $request->input('search');

        // Query the applications, filtering if a search query is provided
        $applications = Application::when($search, function ($query) use ($search) {
            return $query->where('firstname', 'LIKE', "%$search%")
                ->orWhere('middlename', 'LIKE', "%$search%")
                ->orWhere('lastname', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('status', 'LIKE', "%$search%")
                ->orWhere('marks', 'LIKE', "%$search%")
                ->orWhere('postname', 'LIKE', "%$search%")
                ->orWhereHas('job', function ($q) use ($search) {
                    $q->where('postname', 'LIKE', "%$search%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%");
                });
        })->paginate(10);  // Adjust pagination to your needs (10 is just an example)

        // Pass the applications and search query to the view
        return view('admin.applications.index', compact('applications', 'search'));
    }


    // Get profile data
    public function listProfiles(Request $request)
    {
        // Get the search query parameter (if any)
        $search = $request->input('search', '');  

        // Query profiles, filter by the search term if provided
        $profiles = Profile::when($search, function($query, $search) {
            return $query->where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('dob', 'like', '%' . $search . '%')
            ->orWhere('gender', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('contact_no', 'like', '%' . $search . '%');
        })->paginate(10);  // Adjust pagination as needed

        // Pass the search term and profiles to the view
        return view('admin.profiles.index', compact('profiles', 'search'));
    }

}
