<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JRIFF Finance</title>

    {{-- Bootstrap core CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- Custom CSS --}}
    <link href="/css/style.css" rel="stylesheet">
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/b95dacae62.js" crossorigin="anonymous"></script>
  </head>
  <body>
    {{-- Header --}}
    @include('layouts.header')

    <div class="container-fluid">
      <div class="row">
        {{-- Sidebar --}}
        @include('layouts.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          {{-- Pages --}}
          @yield('container')
        </main>
      </div>
    </div>

    {{-- Bootstrap core JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- Custom JS --}}
    <script src="js/script.js"></script>
    
  </body>
</html>