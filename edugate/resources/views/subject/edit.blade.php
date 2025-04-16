@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Subject</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subjects</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Subject</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('subject.update', $subject->sub_id) }}" method="POST">
            @csrf
            <input type="hidden" name="sub_id" value="{{ $subject->sub_id }}">
            <div class="card-body">
                <div class="mb-3">
                    <label for="course" class="form-label">Select Course</label>
                    <select name="course" id="course" class="form-control @error('course') is-invalid @enderror">
                        <option value="">Select Course</option>
                        @foreach($courses as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $subject->course_id ? 'selected' : '' }}>
                            {{ $data->course_name }}
                        </option>
                        @endforeach
                    </select>
                    @error('course')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control @error('semester') is-invalid @enderror">
                        <option value="">Select Semester</option>
                        @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ $semester->id == $subject->sem_id ? 'selected' : '' }}>
                            {{ $semester->semester_number }}
                        </option>
                        @endforeach
                    </select>
                    @error('semester')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Subject Name</label>
                    <input value="{{ old('name', $subject->name) }}" type="text"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter Subject Name"
                        name="name" id="name">
                    @error('name')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1"
                            {{ old('status', $subject->status) == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0"
                            {{ old('status', $subject->status) == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_inactive">Inactive</label>
                    </div>
                    @error('status')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection