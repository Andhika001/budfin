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
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-6">
            <div class="card" style="border-radius: 1rem;">
              <div class="row">
                <div class="d-flex align-items-center">
                  <div class="card-body p-4 p-lg-4 text-black">
                    @if (session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    <form action="/balance" method="post" autocomplete="on">
                      @csrf
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <span class="h1 fw-bold mb-0">Starting Balance</span>
                      </div>

                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Default balance is 0 when you fill blank</h5>

                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="balance" placeholder="0" name="balance" autofocus>
                        <label for="balance">Your Balance</label>
                      </div>
                      
                      <div class="pt-1 mb-4 d-grid gap-2">
                        <button class="w-100 btn btn-lg btn-dark" type="submit">Go to Dashboard</button>
                      </div>

                      <p class="mb-2 pb-lg-2 text-muted">*you can change later</p>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </body>
</html>