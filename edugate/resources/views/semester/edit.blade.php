@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Semester</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('semester.index') }}">Semester</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Semester</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form enctype="multipart/form-data" action="{{ route('semester.update', $semester->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="card-body">

        <div class="mb-3">
          <div class="form-group">
            <label>Select Course</label>
            <select name="course" class="form-control">
              <option value="">Select Course</option>
              @if($courses->isEmpty())
                <!-- No courses available -->
              @else
                @foreach ($courses as $course)
                  <option value="{{ $course->id }}" @if($course->id == $semester->course_id) selected @endif>
                    {{ $course->course_name }}
                  </option>
                @endforeach
              @endif
            </select>
            @error('course')
              <p class="invalid-feedback">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="semester_number">Semester Number</label>
          <input type="text" class="form-control" id="semester_number" name="semester_number" placeholder="Enter Semester Number" value="{{ $semester->semester_number }}" required>
        </div>

        <div class="form-group">
          <label>Status</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ $semester->status == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="status_active">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ $semester->status == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="status_inactive">
              Inactive
            </label>
          </div>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-lg btn-primary">Update</button>
        </div>
      </div>
    </form>
    <!-- /.card -->
  </div>
</section>
<!-- /.content -->
@endsection
