@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subject Pdfs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subject</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Subject Pdf</h3>
            <div class="card-tools">
                <a href="{{ route('subject_pdfs.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($subjectPdf->isEmpty())
            <p>No Subject Pdf found.</p>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sub ID</th>
                        <th>File Name</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjectPdf as $pdf)
                    <tr>
                        <td>{{ $pdf->pdf_id }}</td>
                        <td>{{ $pdf->sub_id }}</td>
                        <td>{{ $pdf->file_name }}</td>
                        <td>{{ $pdf->status ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $pdf->created_by }}</td>
                        <td>
                            <a href="{{ route('subject_pdfs.show', $pdf->pdf_id) }}"
                                class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('subject_pdfs.edit', $pdf->pdf_id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('subject_pdfs.destroy', $pdf->pdf_id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
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