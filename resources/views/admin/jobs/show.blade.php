@extends('layouts.app')

@section('content')
    <h1>{{ $job->postname }} at {{ $job->company_name }}</h1>
    <p>Job ID: {{ $job->job_id }}</p>
    <p>Location: {{ $job->location }}</p>
    <p>Salary: {{ $job->salary }}</p>
    <p>Experience: {{ $job->experience }}</p>
    <p>Job Type: {{ $job->job_type }}</p>
    <p>Category: {{ $job->category }}</p>
    <p>Last Date: {{ $job->last_date }}</p>
    <h3>Skills Required</h3>
    <p>{{ $job->skills }}</p>
    <h3>Educational Requirements</h3>
    <p>{{ $job->educational_requirements }}</p>
    <h3>Responsibilities</h3>
    <p>{{ $job->responsibility }}</p>
@endsection
