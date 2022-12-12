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
    {{-- Data Tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
    {{-- Sweet Alert --}}
    @include('sweetalert::alert')
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    {{-- Data Tables JS --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    {{-- Bootstrap core JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    {{-- Custom JS --}}
    <script src="js/script.js"></script>
    {{-- Data Tables Ready --}}
    <script>
      $(document).ready( function () {
        let t = $('#myTable').DataTable({
          "scrollY": "481px",
          "scrollCollapse": false,
          "columns": [
            { "width": "5%" },
            { "width": "15%" },
            { "width": "25%" },
            { "width": "15%" },
            { "width": "15%" },
            { "width": "10%" },
            { "width": "15%" }
          ],
          columnDefs: [
              {
                searchable: false,
                orderable: false,
                targets: 0,
              },
            ],
          order: [[5, 'desc']]
        });

        t.on('order.dt search.dt', function () {
          let i = 1;

          t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
          });
        }).draw();
      });
    </script>
  </body>
</html>
