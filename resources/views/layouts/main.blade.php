<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Reporteador') | Mercalub</title>
  {{-- Bootstrap assets --}}
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  {{-- Datatables CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

</head>
<body>
  @include('layouts.nav')

  <main role="main" class="container p-3">

    @yield('content')

  </main>
  <!-- /.container -->
  <script src="{{ asset('/js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  @yield('scripts')

</body>
</html>
