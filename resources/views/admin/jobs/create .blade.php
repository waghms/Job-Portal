@extends('layouts.admin')

@section('content')
<h1>Add Job</h1>
<form action="{{ route('admin.jobs.store') }}" method="POST">
    @csrf
    <input type="text" name="job_id" placeholder="Job ID" required>
    <input type="text" name="postname" placeholder="Post Name" required>
    <input type="text" name="company_name" placeholder="Company Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="number" step="0.01" name="salary" placeholder="Salary" required>
    <input type="text" name="experience" placeholder="Experience" required>
    <select name="job_type" required>
        <option value="Full-time">Full-time</option>
        <option value="Part-time">Part-time</option>
    </select>
    <select name="category" required>
        <option value="Marketing">Marketing</option>
        <option value="Customer Service">Customer Service</option>
        <!-- Add more categories -->
    </select>
    <input type="date" name="last_date" required>
    <textarea name="skills" placeholder="Skills" required></textarea>
    <textarea name="educational_requirements" placeholder="Educational Requirements" required></textarea>
    <textarea name="responsibility" placeholder="Responsibility" required></textarea>
    <button type="submit">Save</button>
</form>
@endsection
