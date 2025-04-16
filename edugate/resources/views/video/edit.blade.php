@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Video Lecture</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('video.index') }}">Video Lectures</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Video Lecture</h3>
    </div>
    <!-- /.card-header -->

    <form enctype="multipart/form-data" action="{{ route('video.update', $videoLecture->video_id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="card-body">
        <div class="mb-3">
          <label for="sub_id" class="form-label h7">Subject ID</label>
          <input value="{{ old('sub_id', $videoLecture->sub_id) }}" type="text" class="form-control form-control-lg @error('sub_id') is-invalid @enderror" placeholder="Enter Subject ID" name="sub_id" id="sub_id">
          @error('sub_id')
            <p class="invalid-feedback">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="title" class="form-label h7">Title</label>
          <input value="{{ old('title', $videoLecture->title) }}" type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="Enter Title" name="title" id="title">
          @error('title')
            <p class="invalid-feedback">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-3">
          <label for="video_file_name" class="form-label h7">Video File</label>
          <input type="file" class="form-control form-control-lg @error('video_file_name') is-invalid @enderror" name="video_file_name" id="video_file_name">
          @if ($videoLecture->video_file_name)
            <p>Current File: <a href="{{ asset('storage/videos/' . $videoLecture->video_file_name) }}" target="_blank" type="video/mp4">Download</a></p>
            <!-- <source src="{{ asset('storage/videos/' . $videoLecture->video_file_name) }}" type="video/mp4"> -->
            @endif
          @error('video_file_name')
            <p class="invalid-feedback">{{ $message }}</p>
          @enderror
        </div>

        <!-- <div class="mb-3">
          <label for="created_on" class="form-label h7">Created On</label>
          <input type="date" class="form-control form-control-lg @error('created_on') is-invalid @enderror" name="created_on" id="created_on" value="{{ old('created_on', $videoLecture->created_on ? $videoLecture->created_on->format('Y-m-d') : '') }}">
          @error('created_on')
            <p class="invalid-feedback">{{ $message }}</p>
          @enderror
        </div> -->

        <!-- Status Field -->
        <div class="mb-3">
          <label for="status" class="form-label h7">Status</label>
          <select class="form-control form-control-lg @error('status') is-invalid @enderror" name="status" id="status">
            <option value="active" {{ old('status', $videoLecture->status) == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $videoLecture->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
          @error('status')
            <p class="invalid-feedback">{{ $message }}</p>
          @enderror
        </div>

        <div class="d-grid">
          <button class="btn btn-lg btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
  <!-- /.card -->
</section>
@endsection
