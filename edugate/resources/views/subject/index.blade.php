@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Subject Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subjects</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Subjects</h3>
            <div class="card-tools">
                <a href="{{ route('subject.create') }}" class="btn btn-primary">Add New Subject</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if ($subjects->isEmpty())
            <p>No subjects found.</p>
            @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Semester</th>
                        <th>Subject Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->sub_id }}</td> 
                        <td>{{ $subject->course->course_name ?? 'N/A' }}</td> 
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->semester_number }}</td> 
                        <td>{{ $subject->status ? 'Active' : 'Inactive' }}</td> 
                        <td>
                            <a href="{{ route('subject.show', $subject->sub_id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('subject.edit', $subject->sub_id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('subject.destroy', $subject->sub_id) }}" method="POST"
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