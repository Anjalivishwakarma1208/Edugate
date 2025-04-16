@extends('admin.layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
          <div class="col-lg-3 col-6">
             <div class="small-box bg-info">
                <div class="inner">
                   <h3>155</h3>
                   <p>Users</p>
                </div>
                <div class="icon">
                   <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <div class="col-lg-3 col-6">
             <div class="small-box bg-success">
                <div class="inner">
                   <h3>15
                    <!-- <sup style="font-size: 20px">%</sup> -->
                  </h3>
                   <p>Course</p>
                </div>
                <div class="icon">
                   <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <div class="col-lg-3 col-6">
             <div class="small-box bg-warning">
                <div class="inner">
                   <h3>23</h3>
                   <p>MCQ Questions</p>
                </div>
                <div class="icon">
                   <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <div class="col-lg-3 col-6">
             <div class="small-box bg-danger">
                <div class="inner">
                   <h3>65</h3>
                   <p>Unique Visitors</p>
                </div>
                <div class="icon">
                   <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
       </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
 