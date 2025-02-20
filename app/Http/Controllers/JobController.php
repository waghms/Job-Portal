<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    // Display all jobs with optional search functionality
    public function index(Request $request)
    {
        // Get the search query from the request (if any)
        $search = $request->input('search');

        // Query the jobs, filtering if a search query is provided
        $jobs = Job::when($search, function ($query) use ($search) {
            return $query->where('job_id', 'LIKE', "%$search%")
                ->orWhere('postname', 'LIKE', "%$search%")
                ->orWhere('company_name', 'LIKE', "%$search%")
                ->orWhere('location', 'LIKE', "%$search%")
                ->orWhere('salary', 'LIKE', "%$search%")
                ->orWhere('experience', 'LIKE', "%$search%")
                ->orWhere('job_type', 'LIKE', "%$search%")
                ->orWhere('category', 'LIKE', "%$search%")
                ->orWhere('last_date', 'LIKE', "%$search%")
                ->orWhere('skills', 'LIKE', "%$search%")
                ->orWhere('educational_requirements', 'LIKE', "%$search%")
                ->orWhere('responsibility', 'LIKE', "%$search%")
                ->orWhere('vacancy', 'LIKE', "%$search%");
        })->paginate(5);  // You can adjust pagination to your needs

        

        // Pass the jobs and search query to the view
        return view('jobs.index', compact('jobs', 'search'));
    }

    // Show a form to create a new job
    public function create()
    {
        return view('jobs.create');
    }

    // Store a new job
    public function store(Request $request)
    {
        // Validate input, including logo upload
        $request->validate([
            'job_id' => 'required|unique:jobs',
            'postname' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'category' => 'required',
            'last_date' => 'required|date',
            'skills' => 'required',
            'educational_requirements' => 'required',
            'responsibility' => 'required',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // logo validation
            'vacancy' => 'required',
        ]);

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            // Store the logo in the 'public/logos' folder
            $logoPath = $request->file('logo')->store('logos', 'public');
        }
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        // Convert the skills array to a comma-separated string
        $skills = implode(',', $request->skills);

        // Convert the responsibility array to a comma-separated string
        $responsibility = implode(',', $request->responsibility);

        // Create the job with logo path
        Job::create([
            'job_id' => $request->job_id,
            'postname' => $request->postname,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'salary' => $request->salary,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'category' => $request->category,
            'last_date' => $request->last_date,
            'skills' => $skills,  // Store as a string
            'educational_requirements' => $request->educational_requirements,
            'responsibility' => $responsibility,  // Store as a string
            'logo' => $logoPath,  // Save the logo path to the database
            'vacancy' => $request->vacancy,
        ]);

        // Redirect with success message
        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
    }

    // Show a specific job
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function pageDetails($job_id)
    {
        // Find the job by job_id
        $job = Job::where('job_id', $job_id)->firstOrFail();

        // Return the job details page with the job data
        return view('jobs.page-details', compact('job'));
    }


    // Show a form to edit a job
    public function edit($id)
    {
        $job = Job::findOrFail($id); // Find the job by ID
        return view('jobs.edit', compact('job')); // Pass the job data to the view
    }

    // Update a job
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'job_id' => 'required|unique:jobs,job_id,' . $id,
            'postname' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'category' => 'required',
            'last_date' => 'required|date',
            'skills' => 'required|array', // Ensure skills is an array
            'skills.*' => 'string', // Ensure each skill is a string
            'educational_requirements' => 'required',
            'responsibility' => 'required|array', // Ensure responsibility is an array
            'responsibility.*' => 'string', // Ensure each responsibility is a string
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5242880', // 5 MB
            'vacancy' => 'required',
        ]);

        // Find the job record by ID
        $job = Job::findOrFail($id);

        // Process 'responsibility' and 'skills' to store them as comma-separated strings (no spaces after commas)
        $responsibilities = $request->input('responsibility', []);
        $skills = $request->input('skills', []);

        // Convert the arrays to comma-separated strings
        $responsibilitiesString = implode(',', $responsibilities); // Comma-separated string
        $skillsString = implode(',', $skills); // Comma-separated string

        // Handle logo file upload (if exists)
        if ($request->hasFile('logo')) {
            // Delete the old logo file if it exists
            if ($job->logo && \Storage::exists('public/' . $job->logo)) {
                \Storage::delete('public/' . $job->logo);
            }
            // Store the new logo
            $logoPath = $request->file('logo')->store('logos', 'public');
            $job->logo = $logoPath; // Update the job with the new logo
        }

        // Update job details, including the comma-separated responsibilities and skills
        $job->update([
            'job_id' => $request->input('job_id'),
            'postname' => $request->input('postname'),
            'company_name' => $request->input('company_name'),
            'location' => $request->input('location'),
            'salary' => $request->input('salary'),
            'experience' => $request->input('experience'),
            'job_type' => $request->input('job_type'),
            'category' => $request->input('category'),
            'last_date' => $request->input('last_date'),
            'skills' => $skillsString, // Store skills as comma-separated string
            'educational_requirements' => $request->input('educational_requirements'),
            'responsibility' => $responsibilitiesString, // Store responsibilities as comma-separated string
            'vacancy' => $request->input('vacancy'),
        ]);

        // Redirect to jobs index with success message
        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    // Delete a job
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // Delete the logo if it exists
        if ($job->logo && \Storage::exists('public/' . $job->logo)) {
            \Storage::delete('public/' . $job->logo);
        }

        // Delete the job
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }

}
