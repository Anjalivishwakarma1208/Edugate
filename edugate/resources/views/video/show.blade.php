@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Video Lecture Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('video.index') }}">Video Lectures</a></li>
          <li class="breadcrumb-item active">Details</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Show Page</h3>
    </div>
    <div class="card-body">
    <p><strong>Title:</strong> {{ $videoLecture->title }}</p>
    <p><strong>Course ID:</strong> {{ $videoLecture->video_id }}</p>
      <p><strong>Subject ID:</strong> {{ $videoLecture->sub_id }}</p>
      <p><strong>Status:</strong> {{ $videoLecture->status }}</p>
      <p><strong>Created :</strong> {{ $videoLecture->created_at }}</p>
      <p><strong>Updated:</strong> {{ $videoLecture->updated }}</p>

      @if ($videoLecture->video_file_name)
        <video controls width="600" height="400"> 
          <source src="{{ asset('storage/videos/' . $videoLecture->video_file_name) }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      @endif
    </div>
  </div>
</section>

<!-- /.content -->
@endsection
