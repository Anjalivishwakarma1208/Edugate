<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College Project</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        @include('/admin.layouts.nav-top')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('/admin.layouts.side-nav')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/adminlte/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/adminlte/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('/adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('/adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('/adminlte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/adminlte/dist/js/adminlte.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#course_id').on('change', function() {
            var courseId = $(this).val();
           // alert("sdffddgdf");
            if (courseId) {
                $.ajax({
                    url: "{{ route('subject.get_semester_ajax') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        course_id: courseId
                    },
                    success: function(data) {
                        $('#semester_id').empty().append(
                            '<option value="">Select a Semester</option>');
                        $.each(data, function(key, semester) {
                            $('#semester_id').append('<option value="' + semester
                                .id +
                                '">' + semester.semester_number + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching semesters');
                    }
                });
            } else {
                $('#semester_id').empty().append('<option value="">Select a Semester</option>');
            }
        });

        // Fetch subjects when semester is changed
        $('#semester_id').on('change', function() {
            var courseId = $('#course_id').val();
            var semesterId = $(this).val();

            if (courseId && semesterId) {
                $.ajax({
                    url: "{{ route('subject_pdfs.getsubjects') }}", // Updated route
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        course_id: courseId,
                        semester_id: semesterId
                    },
                    success: function(data) {
                        $('#subject_id').empty().append(
                            '<option value="">Select a Subject</option>');
                        $.each(data, function(key, subject) {
                            $('#subject_id').append('<option value="' + subject.id +
                                '">' + subject.name + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error fetching subjects');
                    }
                });
            } else {
                $('#subject_id').empty().append('<option value="">Select a Subject</option>');
            }
        });
    });
    </script>

</body>

</html>