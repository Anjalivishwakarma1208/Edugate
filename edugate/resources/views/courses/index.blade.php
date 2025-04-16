@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Course Management</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Courses</h3>
      <div class="card-tools">
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if ($courses->isEmpty())
        <p>No courses found.</p>
      @else
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Course Name</th>
              <th>Description</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($courses as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->status ? 'Active' : 'Inactive' }}</td>
                <td>
                  <a href="{{ route('courses.show', ['course' => $course->id]) }}" class="btn btn-info btn-sm">View</a>
                  <a href="{{ route('courses.edit', ['course' => $course->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->
@endsection
