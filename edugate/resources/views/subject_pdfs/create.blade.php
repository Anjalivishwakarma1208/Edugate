@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Upload Subject PDF</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subject_pdfs.index') }}">Subject PDFs</a></li>
                    <li class="breadcrumb-item active">Upload</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Upload New Subject PDF</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- /.card-header -->

        <!-- form start -->
        <form enctype="multipart/form-data" action="{{ route('subject_pdfs.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="mb-3">
                    <div class="form-group">
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
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label>Select Semester</label>
                        <select name="semester" id="semester_id" class="form-control">
                            <option value="">Select Semester</option>
                        </select>
                        @error('semester')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label>Select Subject</label>
                        <select name="subject" id="subject_id" class="form-control">
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="file_name" class="form-label">Upload PDF</label>
                    <input type="file" class="form-control" name="file_name" id="file_name">
                    @error('file_name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1"
                            {{ old('status') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0"
                            {{ old('status') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_inactive">Inactive</label>
                    </div>
                    @error('status')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-grid">
                    <button class="btn btn-lg btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection