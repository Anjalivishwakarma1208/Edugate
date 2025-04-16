@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Subject Details</h2>
    <p><strong>Subject Id: </strong> {{ $subject->sub_id }}</p>
    <p><strong>Subject Name: </strong> {{ $subject->name }}</p>

    <p><strong>Semester: </strong> {{ $subject->semester->semester_number }}</p>

    <p><strong>Status:</strong> {{ $subject->status ? 'Active' : 'Inactive' }}</p>
    <!-- <p><strong>Created On:</strong> {{ $subject->created_on }}</p>
    <p><strong>Created By:</strong> {{ $subject->created_by }}</p> -->
    <a href="{{ route('subject.edit', $subject->sub_id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('subject.destroy', $subject->sub_id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('subject.index' )}}" class="btn btn-secondary">Back to Subjects</a>
</div>
@endsection