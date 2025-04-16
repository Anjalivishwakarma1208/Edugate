<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduGate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-white overflow-x-hidden">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3 sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/Logo.jpg') }}" alt="EduGate" width="100" height="50">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <div class="btn-group">
                    <a href="{{ url('/login') }}" class="btn btn-outline-success btn-md mr-3">LogIn</a>
                    <a href="{{ url('/signup') }}" class="btn btn-success btn-md">SignUp</a>
                </div>
            </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Courses
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li><a class="dropdown-item" href="bscit.html">Bsc-IT</a></li> -->
                            <li><a class="dropdown-item" href="{{ url('/bscit') }}">Bsc-IT</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- <li><a class="dropdown-item" href="bsccs.html">Bsc-CS</a></li> -->
                            <li><a class="dropdown-item" href="{{ url('/bsccs') }}">Bsc-CS</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- <li><a class="dropdown-item" href="bca.html">BCA</a></li> -->
                            <li><a class="dropdown-item" href="{{ url('/bca') }}">BCA</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <!-- <li><a class="dropdown-item" href="mca.html">MCA</a></li> -->
                            <li><a class="dropdown-item" href="{{ url('/mca') }}">MCA</a></li>
                        </ul>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/ebook') }}">E-Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/mcq') }}">MCQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('/videolec') }}">Video Lectures</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Others
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/aboutus') }}">About Us</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/contactus') }}">Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>