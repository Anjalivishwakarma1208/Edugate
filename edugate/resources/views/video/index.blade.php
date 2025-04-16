@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Video Lectures Management</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <!-- <li class="breadcrumb-item active">Video Lectures</li> -->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <!-- <h3 class="card-title">Video Lectures</h3> -->
      <div class="card-tools">
        <a href="{{ route('video.create') }}" class="btn btn-primary">Add New</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if ($videoLectures->isEmpty())
        <p>No video lectures found.</p>
      @else
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Sub ID</th>
            <th>Video File</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
           
            
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($videoLectures as $videoLecture)
            <tr>
              <td>{{ $videoLecture->video_id }}</td>
              <td>{{ $videoLecture->title }}</td>
              <td>{{ $videoLecture->sub_id }}</td>
              <td>
                @if ($videoLecture->video_file_name)
                  <a href="{{ asset('storage/videos/' . $videoLecture->video_file_name) }}">Download</a>
                @else
                  No video file available
                @endif
              </td>
              <td>{{ $videoLecture->created_at }}</td>
              <td>{{ $videoLecture->updated }}</td>
              <td>{{ $videoLecture->status ?? 'N/A' }}</td> 
              
              <!-- <td>{{ $videoLecture->created_by }}</td> -->
              <!-- <td>
                @if ($videoLecture->video_file_name)
                  <a href="{{ asset('storage/videos/' . $videoLecture->video_file_name) }}">Download</a>
                @else
                  No video file available
                @endif
              </td> -->
              <!-- <td>{{ $videoLecture->status ?? 'N/A' }}</td> Display status -->
              <td>
                <a href="{{ route('video.show', $videoLecture->video_id) }}">View</a>
                <a href="{{ route('video.edit', $videoLecture->video_id) }}">Edit</a>
                <form action="{{ route('video.destroy', $videoLecture->video_id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
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
