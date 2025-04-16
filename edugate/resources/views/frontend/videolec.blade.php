<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Lectures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('common.header')
    
    <div class="bg-image d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('Ebooks/ebook bg.jpg') }}'); height: 30vh;">
      <h1 class="text-white">Video Lectures</h1>
    </div>
    
    <div class="container m-5 mx-auto">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="bg-success text-white">Title</th>
            <th class="bg-success text-white text-center">Video</th>
          </tr>
        </thead>
        <tbody>
        @forelse($videoLectures as $lecture)
          <tr>
            <td>{{ $lecture->title }}</td>
            <td class="d-flex justify-content-center">
              @if($lecture->video_file_name && file_exists(public_path('storage/videos/' . $lecture->video_file_name)))
                <!-- Directly Display Video -->
                <video width="320" height="240" controls>
                  <source src="{{ asset('storage/videos/' . $lecture->video_file_name) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              @else
                <!-- Show Placeholder if Video is Not Available -->
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <img class="card-img-top video-link" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="{{ asset('storage/videos/' . $lecture->video_file_name) }}" alt="Video Thumbnail">
                    <div class="play-button">&#9658;</div>
                  </div>
                </div>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="2">No video lectures available</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="videoModalLabel">Video Lecture</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <video id="videoPlayer" width="100%" height="auto" controls>
              <source id="videoSource" type="video/mp4">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
      </div>
    </div>
    
    @include('common.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
      // When a video thumbnail is clicked, set the modal's video source
      document.querySelectorAll('.video-link').forEach(item => {
        item.addEventListener('click', function() {
          var videoUrl = this.getAttribute('data-video'); // Get video URL
          var videoPlayer = document.getElementById('videoPlayer');
          var videoSource = document.getElementById('videoSource');
          
          // Set the video source and reload the player
          videoSource.setAttribute('src', videoUrl);
          videoPlayer.load(); // Load the new video
        });
      });
    </script>
  </body>
</html>
