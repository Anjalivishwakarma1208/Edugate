@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $subject->subject_name }}</h1>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Images/subject{{ $subject->id }}.png" alt="{{ $subject->subject_name }}"
                    class="img-fluid rounded-start" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $subject->course_name }}</h5>
                    <p class="card-text">{{ $subject->semester_name }}</p>
                    <p class="card-text">{{ $subject->description ?? 'No description available.' }}</p>
                    <p class="card-text"><small class="text-muted">Subject ID: {{ $subject->id }}</small></p>
                    <a href="{{ url('/subjects') }}" class="btn btn-secondary">Back to Subjects</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection