@extends('layouts.admin')

@section('content')
<h1>Edit Job</h1>
<form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="postname" value="{{ $job->postname }}" required>
    <input type="text" name="company_name" value="{{ $job->company_name }}" required>
    <input type="text" name="location" value="{{ $job->location }}" required>
    <input type="number" step="0.01" name="salary" value="{{ $job->salary }}" required>
    <input type="text" name="experience" value="{{ $job->experience }}" required>
    <select name="job_type" required>
        <option value="Full-time" {{ $job->job_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
        <option value="Part-time" {{ $job->job_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
    </select>
    <select name="category" required>
        <option value="Marketing" {{ $job->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
        <!-- Add more categories -->
    </select>
    <input type="date" name="last_date" value="{{ $job->last_date }}" required>
    <textarea name="skills" required>{{ $job->skills }}</textarea>
    <textarea name="educational_requirements" required>{{ $job->educational_requirements }}</textarea>
    <textarea name="responsibility" required>{{ $job->responsibility }}</textarea>
    <button type="submit">Update</button>
</form>
@endsection
