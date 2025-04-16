@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Semester Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Semester</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Semester</h3>
            <div class="card-tools">
                <a href="{{ route('semester.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($semester->isEmpty())
            <p>No Semester found.</p>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Semester Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semester as $Semesters)
                    <tr>
                        <td>{{ $Semesters->id }}</td> <!-- Change here to display actual ID -->
                        <td>{{ $Semesters->course_name }}</td>
                        <td>{{ $Semesters->semester_number }}</td>
                        <td>{{ $Semesters->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('semester.show', $Semesters->id) }}" class="btn btn-sm btn-info">View</a>

                            <a href="{{ route('semester.edit', $Semesters->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('semester.destroy', $Semesters->id) }}" method="POST"
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