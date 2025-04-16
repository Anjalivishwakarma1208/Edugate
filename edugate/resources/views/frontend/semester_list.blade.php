<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BSC-IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('common.header')
    <!-- Background image -->
    <div class="bg-image d-flex justify-content-center align-items-center" style="
  background-image: url('https://mdbcdn.b-cdn.net/img/new/fluid/nature/015.webp');
  height: 30vh;
">
        <h1 class="text-white">SEMESTER LISTING</h1>
    </div>


    <!-- Semesters -->
    <section id="BscItSem">
        <h1 class="text-black text-center mt-5 mb-5">SELECT YOUR SEMESTER</h1>
        <div class="container p-3 mx-auto m-5 mb-5">
            <div class="row mb-2">
                <!-- SEM 1 -->
                <!-- <button type="button" class="btn btn-primary mb-3 mx-auto"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    First Year
                </button> -->
                @if($semesters->isEmpty())
                <div class="col-md-12 text-center">
                    <p>No semester found.</p>
                </div>
                @else
                @foreach($semesters as $semester)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">
                                {{ $semester->course_name }} - SEM-{{ $semester->semester_number }}
                            </strong>
                            <p class="card-text mb-auto">
                                This section furnishes detailed notes and resources for {{ $semester->course_name }}
                                SEM-{{ $semester->semester_number }}.
                            </p>
                            <a href="{{ url('/subject' ."/".$semester->id."/".$semester->semester_number) }}"
                                class="icon-link gap-1 stretched-link mt-3">
                                <button type="button" class="btn btn-primary">Click Here</button>
                                <svg class="bi">
                                    <use xlink:href="#chevron-right"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="{{ asset('images/semester' . $semester->semester_number . '.png') }}"
                                alt="sem{{ $semester->semester_number }}" width="200" height="200"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Thumbnail"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>{{ $semester->course_name }} - SEM-{{ $semester->semester_number }}</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>