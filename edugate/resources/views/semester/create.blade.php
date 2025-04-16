@extends('admin.layouts.app')

@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Create New Semester</h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ route('semester.index') }}">Semesters</a></li>
               <li class="breadcrumb-item active">Create</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<section class="content">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title">Add New Semester</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <!-- Developed By Anjali Vishwakarma -->
      <form enctype="multipart/form-data" action="{{ route('semester.store') }}" method="post">
         @csrf
         <div class="card-body">
            <div class="mb-3">
               <div class="form-group">
                  <label>Select Course</label>
                  <select name="course_id" class="form-control @error('course_id') is-invalid @enderror">
                     <option value="">Select Course</option>
                     @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                           {{ $course->course_name }}
                        </option>
                     @endforeach
                  </select>
                  @error('course_id')  
                     <p class="invalid-feedback">{{ $message }}</p>
                  @enderror
               </div>
            </div>
            <div class="mb-3">
               <label for="semester_number" class="form-label h7">Semester Number</label>
               <input value="{{ old('semester_number') }}" type="text"
                  class="form-control form-control-lg @error('semester_number') is-invalid @enderror"
                  placeholder="Enter Semester Number" name="semester_number" id="semester_number">
               @error('semester_number')
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
