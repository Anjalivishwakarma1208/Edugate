<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BCA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('common.header')
  <h1 class="text-black text-center mt-5 mb-5">TEST YOUR KNOWLEDGE</h1>
    <!-- Row 1 -->
  <div class="container mx-auto m-3">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <a href="mathematics.html" class="text-decoration-none">
          <div class="card mb-3 subject" id="mathematics">
            <img src="Images/maths.avif" class="card-img-top" alt="Mathematics" width="200" height="200">
            <div class="card-body text-center">
              <p class="card-text">Mathematics</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="{{ url('/science') }}" class="text-decoration-none">
          <div class="card mb-3 subject" id="science">
            <img src="Images/science.jpg" class="card-img-top" alt="Science" width="200" height="200">
            <div class="card-body text-center">
              <p class="card-text">Science</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="economics.html" class="text-decoration-none">
          <div class="card mb-3 subject" id="economics">
            <img src="Images/economics.jpg" class="card-img-top" alt="Economics" width="200" height="200">
            <div class="card-body text-center">
              <p class="card-text">Economics</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Row 2 -->
  <div class="container mx-auto m-3">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <a href="History.html" class="text-decoration-none">
          <div class="card mb-3 subject" id="mathematics">
            <img src="Images/history.png" class="card-img-top" alt="Mathematics" width="200" height="200">
            <div class="card-body text-center">
              <p class="card-text">History</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="computerscience.html" class="text-decoration-none">
          <div class="card mb-3 subject" id="science">
            <img src="Images/cs.jpg" class="card-img-top" alt="Science" width="200" height="200">
            <div class="card-body text-center">
              <p class="card-text">Computer Science</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="biology.html" class="text-decoration-none">
          <div class="card mb-3 subject" id="economics">
            <img src="Images/biology.jpg" class="card-img-top" alt="biology" width="200" height="200">
            <div class="card-body text-center">
              <p class="card-text">Biology</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  @include('common.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
  </body>