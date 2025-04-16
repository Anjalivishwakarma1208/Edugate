@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit PDF</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('subject_pdfs.index') }}">Subject</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit PDF</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form enctype="multipart/form-data" action="{{ route('subject_pdfs.update', $subjectPdf->pdf_id) }}"
            method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sub_id">Sub ID</label>
                <input type="text" name="sub_id" class="form-control" id="sub_id" value="{{ $subjectPdf->sub_id }}">
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Subject Pdf</label>
                    <input type="file" class="form-control" id="file_name" name="file_name"
                        placeholder="Enter Subject Pdf" value="{{ $subjectPdf->pdf_id }}" accept="application/pdf"
                        required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status_active" value="1"
                            {{ $subjectPdf->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_active">
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0"
                            {{ $subjectPdf->status == 0 ? 'checked' : '' }}>
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