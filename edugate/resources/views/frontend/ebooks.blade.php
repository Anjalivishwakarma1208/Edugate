<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ebooks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('common.header')
    <section id="ebk">
    <h1 class="text-dark text-center mt-5 mb-3">E-Books</h1>
    <div class="container-fluid d-grid gap-2 mx-auto p-5">
        <a href="{{url('/bscit')}}" class="btn btn-outline-primary">BSC-IT Notes</a>
        <a href="{{url('/bca')}}" class="btn btn-outline-secondary">BCA Notes</a>
        <a href="{{url('/bsccs')}}" class="btn btn-outline-success">BSC-CS Notes</a>
        <a href="{{url('/mca')}}" class="btn btn-outline-warning">MCA Notes</a>
        <a href="{{url('/reference')}}" class="btn btn-outline-danger">All Reference E-Books</a>
    </div>
</section>
@include('common.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
  