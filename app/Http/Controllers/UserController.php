<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Job; 
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('user.register');
    }

    // Handle user registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'resume' => 'nullable|mimes:pdf,jpeg,png,jpg,gif,svg|max:5242880', //5 MB SIZE
        ]);

        // Handle resume file upload
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'resume' => $resumePath,  // Save the resume path to the database
        ]);

        return redirect()->route('user.login')->with('success', 'User registered successfully!');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('user.login');
    }

    // Authenticate the user
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login with the provided credentials
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout the user
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }

    // Show the edit profile form
    public function edit()
    {
        $user = Auth::guard('user')->user(); // Get the logged-in user
        return view('user.edit', compact('user')); // Pass the logged-in user data to the view
    }

    // Show dashboard with all jobs
    // public function dashboard()
    // {
    //     // Paginate the jobs (fetch 5 jobs per page)
    //     $Jobs = Job::paginate(5);

    //     // Return the view with the paginated jobs
    //     return view('user.dashboard', compact('Jobs'));
    // }

    public function dashboard()
    {
        // Define the categories we want to fetch vacancies for
        $categories = [
            'Marketing',
            'Customer Service',
            'Human Resource',
            'Project Management',
            'Business Development',
            'Sales & Communication',
            'Design & Creative',
            'Others'
        ];

        // Initialize an empty array to store the vacancy counts
        $vacancyCounts = [];

        // Loop through each category and get the sum of vacancies for that category
        foreach ($categories as $category) {
            // Count the total number of vacancies for the category
            $vacancyCounts[$category] = Job::where('category', $category)->sum('vacancy');
        }

        // Fetch all jobs for the job listing section
        $Jobs = Job::paginate(5); // You can adjust the pagination or query as per your needs

        // Return the view with both vacancy counts and jobs
        return view('user.dashboard', compact('vacancyCounts', 'Jobs'));
    }



    // Handle resume upload functionality
    // public function uploadResume(Request $request)
    // {
    //     // Validate the uploaded file
    //     $request->validate([
    //         'resume' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     // Store the file
    //     $path = $request->file('resume')->store('resumes', 'public');

    //     // Update the user's resume path in the database
    //     $user = Auth::user();
    //     $user->resume = $path;
    //     $user->save();

    //     // Redirect back to dashboard with success message
    //     return redirect()->route('user.dashboard')->with('success', 'Resume uploaded successfully!');
    // }
    // public function uploadResume(Request $request)
    // {
    //     $request->validate([
    //         'resume' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);
    
    //     // Store the uploaded resume
    //     $path = $request->file('resume')->store('resumes', 'public');
    
    //     // Get the authenticated user
    //     $user = Auth::user();
    
    //     // Store resume path in users table
    //     $user->resume = $path;
    //     $user->save();
    
    //     // Ensure a row exists in `profiles` with user_id
    //     DB::table('profiles')->updateOrInsert(
    //         ['user_id' => $user->id],  // Find by user_id
    //         ['user_id' => $user->id]   // Ensure user_id is set
    //     );
    
    //     // Send the resume to an external API
    //     $response = Http::timeout(600)
    //         ->attach(
    //             'file', file_get_contents(storage_path("app/public/{$path}")),
    //             $request->file('resume')->getClientOriginalName()
    //         )
    //         ->post('http://127.0.0.1:8001/upload-pdf', [
    //             'user_id' => $user->id,
    //         ]);
    
    //     if ($response->successful()) {
    //         return response()->json(['success' => true]);
    //     }
    
    //     return response()->json(['success' => false]);
    // }
    public function uploadResume(Request $request)
{
    $user = Auth::user(); // Get the currently logged-in user

    if (!$user) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Validate file input
    $request->validate([
        'resume' => 'required|mimes:pdf|max:2048', // Only PDFs, max 2MB
    ]);

    // Store the resume file securely in 'storage/app/public/resumes/'
    $path = $request->file('resume')->store('resumes', 'public');

    // Save file path in the user's record
    $user->resume = $path;
    $user->save();

    // Send the file to Flask API for processing
    $response = Http::timeout(600)
        ->attach(
            'file', file_get_contents($request->file('resume')->getRealPath()),
            $request->file('resume')->getClientOriginalName()
        )
        ->post('http://127.0.0.1:8001/upload-pdf', [
            'user_id' => $user->id,  // Send logged-in user ID
        ]);

    // Check if Flask API processed successfully
    if ($response->failed()) {
        return response()->json(['error' => 'Failed to process resume'], 500);
    }

    // Redirect if it's a web request, else return JSON
    if ($request->expectsJson()) {
        return response()->json(['message' => 'Resume uploaded successfully!', 'resume_path' => $path]);
    }

    return redirect()->route('user.dashboard')->with('success', 'Resume uploaded successfully!');
}
    public function showApplications()
    {
        // Get the authenticated user
        $user = Auth::guard('user')->user();

        // Fetch the applications for the authenticated user by their ID
        $applications = Application::where('user_id', $user->id)->paginate(5);

        // Return the view with the applications
        return view('user.applications', compact('applications'));
    }

}
