@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Subject</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subjects</a></li>
                    <li class="breadcrumb-item active">Create Subject</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Subject Details</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form enctype="multipart/form-data" action="{{ route('subject.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Select Course</label>
                    <select name="course" id="course_id" class="form-control">
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Select Semester</label>
                    <select name="semester" id="semester_id" class="form-control">
                        <option value="">Select Semester</option>
                    </select>
                    @error('semester')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Subject Name</label>
                    <input type="text" name="subject_name" id="subject_name" placeholder="Enter Subject Name"
                        class="form-control">
                    @error('subject')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Subject</button>
            </form>
        </div>
    </div>
</section>
@endsection