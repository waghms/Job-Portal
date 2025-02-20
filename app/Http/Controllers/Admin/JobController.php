<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Show All Jobs
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    // Show Create Job Form
    public function create()
    {
        return view('admin.jobs.create');
    }

    // Store Job
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|unique:jobs',
            'postname' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'experience' => 'required',
            'job_type' => 'required',
            'category' => 'required',
            'last_date' => 'required|date',
            'skills' => 'required',
            'educational_requirements' => 'required',
            'responsibility' => 'required',
        ]);

        Job::create($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Job added successfully.');
    }

    // Show Edit Form
    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    // Update Job
    public function update(Request $request, $id)
{
    $request->validate([
        'job_id' => 'required|unique:jobs,job_id,' . $id,
        'postname' => 'required',
        'company_name' => 'required',
        'location' => 'required',
        'salary' => 'required|numeric',
        'experience' => 'required',
        'job_type' => 'required',
        'category' => 'required',
    ]);

    $job = Job::findOrFail($id);
    $job->update($request->all());

    return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
}


    // Delete Job
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
