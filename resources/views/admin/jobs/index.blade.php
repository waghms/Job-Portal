@extends('layouts.admin')

@section('content')
<h1>All Jobs</h1>
<a href="{{ route('admin.jobs.create') }}">Add New Job</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Post Name</th>
            <th>Company Name</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
        <tr>
            <td>{{ $job->job_id }}</td>
            <td>{{ $job->postname }}</td>
            <td>{{ $job->company_name }}</td>
            <td>{{ $job->location }}</td>
            <td>
                <a href="{{ url('/admin/jobs/edit/' . $job->id) }}">Edit</a>

                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
