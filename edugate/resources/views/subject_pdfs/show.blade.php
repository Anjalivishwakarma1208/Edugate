@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Subject Pdf Details</h2>
    <p><strong>Subject Pdf: </strong> {{ $subjectPdf->file_name }}</p>
    <p><strong>Status:</strong> {{ $subjectPdf->status ? 'Active' : 'Inactive' }}</p>
    <p><strong>Created On:</strong> {{ $subjectPdf->created_on }}</p>
    <p><strong>Created By:</strong> {{ $subjectPdf->created_by }}</p>
    <a href="{{ route('subject_pdfs.edit', $subjectPdf->pdf_id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('subject_pdfs.destroy', $subjectPdf->pdf_id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="{{ route('subject_pdfs.index' )}}" class="btn btn-secondary">Back to Semesters</a>
</div>
@endsection
