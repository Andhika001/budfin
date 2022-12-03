<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JRIFF Finance</title>

    {{-- Bootstrap core CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  </head>
  <body class="bg-dark">

    <section>

      <div class="container mt-5 py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-8">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="/img/login-cover.jpg"
                    alt="login form" class="img-fluid h-100" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
                    
                    @if (session()->has('loginError'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <form action="/login" method="post">
                      @csrf
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <span class="h1 fw-bold mb-0">Login</span>
                      </div>

                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login to your account</h5>

                      <div class="form-floating mb-4">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required autofocus>
                        <label for="username">Username</label>
                        @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="form-floating mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>

                      <div class="pt-1 mb-4 d-grid gap-2">
                        <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
                      </div>

                      <p class="mb-3 pb-lg-2">Don't have an account? <a href="/register"
                        style="color: #393f81;">Register here</a></p>
                        <div class="text-center">
                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>