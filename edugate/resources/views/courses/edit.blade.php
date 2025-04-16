@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Course</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Course</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Form fields here -->
      <div class="card-body">
        <div class="form-group">
          <label for="course_name">Course Name</label>
          <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name" value="{{ $course->course_name }}" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3" required>{{ $course->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Status</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ $course->status == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="status_active">
              Active
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ $course->status == 0 ? 'checked' : '' }}>
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
</section>
<!-- /.content -->
@endsection

