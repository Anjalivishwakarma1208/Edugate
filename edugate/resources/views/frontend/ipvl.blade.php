<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduGate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
  <!-- Video Lectures -->
  <section id="videolec">
    <div class="container m-5 mx-auto">
      <h1 class="text-black text-center mt-5 mb-5"><span class="text-primary">Imperative Programming</span> Video Lectures</h1>
      <!-- Video Cards -->
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="Images/lec1.jpg" class="card-img-top video-link" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="videos/Lec 1 Python.mp4" alt="Video 1" id="thumbnail1">
            <div class="play-button">&#9658;</div>
          </div>
          <div class="card-body mt-0">
            <h5 class="p-3 bg-opacity-10 border border-secondary-subtle border rounded fs-6 text fw-bold">Introduction To Python</h5>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="Images/lec2.jpg" class="card-img-top video-link" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="videos/Lec 2 Web.mp4" alt="Video 2" id="thumbnail2">
            <div class="play-button">&#9658;</div>
          </div>
          <div class="card-body mt-0">
            <h5 class="p-3 bg-opacity-10 border border-secondary-subtle border rounded fs-6 text fw-bold">RoadMap Of Web Development</h5>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="Images/lec3.jpg" class="card-img-top video-link" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="videos/Lec 3 Bootstrap.mp4" alt="Video 3" id="thumbnail3">
            <div class="play-button">&#9658;</div>
          </div>
          <div class="card-body mt-0">
          <h5 class="p-3 bg-opacity-10 border border-secondary-subtle border rounded fs-6 text fw-bold">Bootstrap In 20 Min</h5>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Video Lecture JS -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var videoModal = document.getElementById('videoModal');
        var videoPlayer = document.getElementById('videoPlayer');
        var videoSource = document.getElementById('videoSource');
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
    
        var thumbnails = [
          { video: '/Images/lec1.jpg', imageId: 'thumbnail1' },
          { video: '/Images/lec2.jpg', imageId: 'thumbnail2' },
          { video: '/Images/lec3.jpg', imageId: 'thumbnail3' }
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
        videoModal.addEventListener('show.bs.modal', function (event) {
          var button = event.relatedTarget;
          var videoSrc = button.getAttribute('data-video');
          videoSource.src = videoSrc;
          videoPlayer.load();
          videoPlayer.play();
        });
    
        // Event listener for closing the modal
        videoModal.addEventListener('hide.bs.modal', function () {
          videoPlayer.pause();
          videoPlayer.currentTime = 0;
        });
      });
    </script>
     @include('common.footer')
  </body>
</html>
  </body>