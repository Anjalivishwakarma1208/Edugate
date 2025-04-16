@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Semester Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('semester.index') }}">Semesters</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Semester Information</h3>
        </div>
        <div class="card-body">
            <p><strong>Semester Number:</strong> {{ $semester->semester_number }}</p>
            <p><strong>Status:</strong> {{ $semester->status ? 'Active' : 'Inactive' }}</p>
            <p><strong>Created On:</strong> {{ $semester->created_on }}</p>
            <!-- <p><strong>Created By:</strong> {{ $semester->created_by }}</p> -->

            <a href="{{ route('semester.edit', $semester->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('semester.destroy', $semester->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            <a href="{{ route('semester.index') }}" class="btn btn-secondary">Back to Semesters</a>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection