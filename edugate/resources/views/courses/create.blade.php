@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Create New Course</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
          <li class="breadcrumb-item active">Create</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add New Course</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form enctype="multipart/form-data" action="{{ route('courses.store') }}" method="post">
    @csrf

    <div class="card-body">
        <div class="mb-3">
            <label for="course_name" class="form-label h7">Course Name</label>
            <input value="{{ old('course_name') }}" type="text" class="form-control form-control-lg @error('course_name') is-invalid @enderror" placeholder="Enter Course Name" name="course_name" id="course_name">
            @error('course_name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label h7">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" name="description" id="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label h7">Image</label>
            <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror" name="image" id="image">
            @error('image')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label h7">Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{ old('status') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_active">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{ old('status') == '0' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_inactive">Inactive</label>
            </div>
            @error('status')
                <p class="invalid-feedback d-block">{{ $message }}</p>
            @enderror
        </div>

        <!-- Hidden fields for created_on and created_by, assuming you handle them in the controller -->

        <div class="d-grid">
            <button class="btn btn-lg btn-primary">Submit</button>
        </div>
    </div>
</form>


  </div>
  <!-- /.card -->
</section>
<!-- /.content -->
@endsection
