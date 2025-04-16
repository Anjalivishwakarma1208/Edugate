@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Course Details</h2>
    <p><strong>Course Name:</strong> {{ $course->course_name }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Image:</strong> {{ $course->image }}</p>
    <p><strong>Status:</strong> {{ $course->status ? 'Active' : 'Inactive' }}</p>
    <!-- <p><strong>Created On:</strong> {{ $course->created_on }}</p>
    <p><strong>Created By:</strong> {{ $course->created_by }}</p> -->
    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
</div>
@endsection