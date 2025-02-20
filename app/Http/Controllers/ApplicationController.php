<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\AptitudeTestQuestion;
use App\Models\Job;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{

    // Method to get states based on country_id
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json(['states' => $states]);
    }
 
    // Method to get districts based on state_id
    public function getDistricts($state_id)
    {
        $districts = District::where('state_id', $state_id)->get();
        return response()->json(['districts' => $districts]);
    }
 
    // Method to get pincode based on district_id
    public function getPincode($district_id)
    {
        $district = District::find($district_id);
        return response()->json(['pincode' => $district->pincode]);
    }

    // Show the job application form
    public function create($job_id)
{
    $job = Job::findOrFail($job_id); // Fetch the job details
    $profile = Profile::where('user_id', Auth::id())->first(); // Fetch the profile details
    return view('user.job.apply', compact('job', 'profile')); // Pass job and profile details to the view
}

    public function store(Request $request, $job_id)
{
    // Validate the form data
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'dob' => 'required|date',
        'email' => 'required|email',
        'gender' => 'required|in:Male,Female,Other',
        'jobroll' => 'required|string|max:255',
        'address' => 'required|string',
        'country' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'pincode' => 'required|string|max:6',
        'contact_no' => 'required|string|max:15',
        'pancard_no' => 'required|string|max:10',
        'ssc_highschool_name' => 'required|string|max:255',
        'ssc_percentage' => 'required|numeric|min:0|max:100',
        'ssc_passout_year' => 'required|digits:4',
        'skills' => 'required|string',
        'company_name' => 'required|string|max:255',
        'work_experience' => 'required|string',
        'location' => 'required|string',
        'profilephoto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Image validation
    ]);

    // Check if the user has already applied for the same job
    $existingApplication = Application::where('user_id', Auth::id())
                                      ->where('job_id', $job_id)
                                      ->first();

    if ($existingApplication) {
        // Check if 6 months have passed since the previous application
        $sixthMonthsAgo = now()->subMonths(6);
        if ($existingApplication->created_at > $sixthMonthsAgo) {
            return redirect()->back()->with('error', 'You have already applied for this job. Please wait 6 months before reapplying.');
        }
    }

    // Handle file upload for the profile photo
    $profilePhotoPath = null;
    if ($request->hasFile('profilephoto')) {
        $profilePhotoPath = $request->file('profilephoto')->store('profile_photos', 'public');
    }

    // Store the application data in the database
    Application::create([
        'user_id' => Auth::id(),
        'job_id' => $job_id,
        'firstname' => $request->firstname,
        'middlename' => $request->middlename,
        'lastname' => $request->lastname,
        'jobroll' => $request->jobroll,
        'dob' => $request->dob,
        'email' => $request->email,
        'gender' => $request->gender,
        'address' => $request->address,
        'country' => $request->country,
        'state' => $request->state,
        'district' => $request->district,
        'pincode' => $request->pincode,
        'contact_no' => $request->contact_no,
        'pancard_no' => $request->pancard_no,
        'ssc_highschool_name' => $request->ssc_highschool_name,
        'ssc_percentage' => $request->ssc_percentage,
        'ssc_passout_year' => $request->ssc_passout_year,
        'hsc_college_name' => $request->hsc_college_name,
        'hsc_percentage' => $request->hsc_percentage,
        'hsc_passout_year' => $request->hsc_passout_year,
        'graduation_college_name' => $request->graduation_college_name,
        'graduation_percentage' => $request->graduation_percentage,
        'graduation_passout_year' => $request->graduation_passout_year,
        'skills' => $request->skills,
        'company_name' => $request->company_name,
        'work_experience' => $request->work_experience,
        'location' => $request->location,
        'profilephoto' => $profilePhotoPath, // Save the profile photo path
        'postname' => $request->postname,
        'marks' => $request->marks,
    ]);

    // Redirect with success message
    return redirect()->route('user.aptitude.test.rules', ['job_id' => $request->job_id])
        ->with('success', 'Application submitted successfully!');
}
}