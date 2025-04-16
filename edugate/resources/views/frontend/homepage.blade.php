<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduGate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    /* video Lecture */
    .card {
        position: relative;
    }

    .card .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 3rem;
        color: white;
        display: none;
    }

    .card:hover .play-button {
        display: block;
    }

    .card-img-top {
        transition: opacity 0.3s;
    }

    .card:hover .card-img-top {
        opacity: 0.7;
    }
    </style>
</head>

<body class="bg-white overflow-x-hidden">

    @include('common.header')

    <!-- Introduction Heroes Section -->
    <section id="heroes">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="Images/Heroes.jpg" class="img-fluid zero-margin mt-0" alt="Bootstrap Themes" width="700"
                        height="900" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3 text-dark">Welcome to EduGate</h1>
                    <p class="lead text-dark">we believe that education is the key to unlocking limitless opportunities
                        and empowering individuals to reach their fullest potential. Whether you're a passionate
                        educator, a curious learner, or a dedicated parent, we're thrilled to welcome you to our online
                        community dedicated to enriching education for all.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Select Courses -->

    <section id="Courses">
        <h1 class="text-black text-center mt-seme5 mb-5">SELECT YOUR COURSE</h1>
        <div class="container p-3 mx-auto">
            <div class="row mb-2">
                @foreach($courses as $course)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">{{ $course->course_name}}</strong>
                            <p class="card-text mb-auto">{{ $course->description }}</p>
                            <a href="{{ route('subject.semester_list', $course->id) }}"
                                class="icon-link gap-1 stretched-link mt-3">
                                <button type="button" class="btn btn-primary">Click Here</button>
                                <svg class="bi">
                                    <use xlink:href="#chevron-right"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="uploads\courses\{{$course->image}}" class="service_img"
                                alt="{{ $course->course_name }}" width="250" height="250">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- E-books -->
    <section id="ebk">
        <h1 class="text-dark text-center mt-5 mb-3">E-Books</h1>
        <div class="container-fluid d-grid gap-2 mx-auto p-5">
            <a href="{{ url('/bscit') }}" class="btn btn-outline-primary">BSC-IT Notes</a>
            <a href="{{ url('/bca') }}" class="btn btn-outline-secondary">BCA Notes</a>
            <a href="{{ url('/bsccs') }}" class="btn btn-outline-success">BSC-CS Notes</a>
            <a href="{{ url('/mca') }}" class="btn btn-outline-warning">MCA Notes</a>
            <a href="{{ url('/reference') }}" class="btn btn-outline-danger">All Reference E-Books</a>
        </div>
    </section>

    <!-- Video Lectures -->
    <section id="videolec">
        <div class="container m-5 mx-auto">
            <h1 class="text-black text-center mt-5 mb-5">Featured <span class="text-primary">Video Lectures</span></h1>
            <!-- Video Cards -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="Images/lec1.jpg" class="card-img-top video-link" data-bs-toggle="modal"
                            data-bs-target="#videoModal" data-video="videos/Lec 1 Python.mp4" alt="Video 1"
                            id="thumbnail1">
                        <div class="play-button">&#9658;</div>
                    </div>
                    <div class="card-body mt-0">
                        <h5 class="p-3 bg-opacity-10 border border-secondary-subtle border rounded fs-6 text fw-bold">
                            Introduction To Python</h5>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="Images/lec2.jpg" class="card-img-top video-link" data-bs-toggle="modal"
                            data-bs-target="#videoModal" data-video="videos/Lec 2 Web.mp4" alt="Video 2"
                            id="thumbnail2">
                        <div class="play-button">&#9658;</div>
                    </div>
                    <div class="card-body mt-0">
                        <h5 class="p-3 bg-opacity-10 border border-secondary-subtle border rounded fs-6 text fw-bold">
                            RoadMap Of Web Development</h5>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="Images/lec3.jpg" class="card-img-top video-link" data-bs-toggle="modal"
                            data-bs-target="#videoModal" data-video="videos/Lec 3 Bootstrap.mp4" alt="Video 3"
                            id="thumbnail3">
                        <div class="play-button">&#9658;</div>
                    </div>
                    <div class="card-body mt-0">
                        <h5 class="p-3 bg-opacity-10 border border-secondary-subtle border rounded fs-6 text fw-bold">
                            Bootstrap In 20 Min</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Video Lecture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <video id="videoPlayer" class="w-100" controls>
                        <source id="videoSource" src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>

    <canvas id="canvas" style="display: none;"></canvas>
    </section>

    <!-- MCQ Section -->
    <section id="mcq" class="bg-info-subtle py-5">
        <div class="container-fluid m-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 text-center text-black">
                    <h1 class="display-4 fw-bold mb-4">Test Your Knowledge</h1>
                    <p class="lead mb-4">Challenge yourself with our interactive multiple-choice questions (MCQs).
                        Choose the correct answer from the options provided and see how well you know the subject!</p>
                    <div class="d-grid gap-2 col-12 mx-auto ">
                        <a href="{{ url('/mcq') }}" class="btn btn-primary">Start MCQ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('common.footer')

    <!-- Video Lecture JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var videoModal = document.getElementById('videoModal');
        var videoPlayer = document.getElementById('videoPlayer');
        var videoSource = document.getElementById('videoSource');
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');

        var thumbnails = [{
                video: 'Images/lec1.jpg',
                imageId: 'thumbnail1'
            },
            {
                video: 'Images/lec2.jpg',
                imageId: 'thumbnail2'
            },
            {
                video: 'Images/lec3.jpg',
                imageId: 'thumbnail3'
            }
        ];

        // Function to generate thumbnail
        function generateThumbnail(videoSrc, imageId) {
            var tempVideo = document.createElement('video');
            tempVideo.src = videoSrc;
            tempVideo.currentTime = 1; // Capture frame at 1 second
            tempVideo.addEventListener('loadeddata', function() {
                canvas.width = tempVideo.videoWidth;
                canvas.height = tempVideo.videoHeight;
                context.drawImage(tempVideo, 0, 0, canvas.width, canvas.height);
                var dataURL = canvas.toDataURL();
                document.getElementById(imageId).src = dataURL;
            });
        }

        // Generate thumbnails for all videos
        thumbnails.forEach(function(thumbnail) {
            generateThumbnail(thumbnail.video, thumbnail.imageId);
        });

        // Event listener for opening the modal
        videoModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var videoSrc = button.getAttribute('data-video');
            videoSource.src = videoSrc;
            videoPlayer.load();
            videoPlayer.play();
        });

        // Event listener for closing the modal
        videoModal.addEventListener('hide.bs.modal', function() {
            videoPlayer.pause();
            videoPlayer.currentTime = 0;
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>

</body>