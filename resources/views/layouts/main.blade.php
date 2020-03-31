<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title', 'WebApp')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/adminlte.min.css') }}">
    <style>
        @media all and (max-width:768px) {
            .calculator tr {
                display: table;
                width:100%;
            }
            .calculator td {
                display: table-row;
            }
        }
    </style>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
@include('layouts.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('content-title', 'Mercalub')</h1>
                    </div>
                    {{--<div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>--}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Mercalub</a>.</strong> Todos los derechos reservados.
    </footer>

    <!-- Control Sidebar -->
{{--    <aside class="control-sidebar control-sidebar-dark">--}}
        <!-- Control sidebar content goes here -->
{{--    </aside>--}}
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<form action="{{ Auth::guard('admin')->check() ? route('admin.logout') : route('logout') }}" method="POST"
      id="logoutForm" class="d-none">
    @csrf
</form>
<!-- jQuery -->
<script src="{{ asset('/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('/admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
{{--@include('sweetalert::alert')--}}
<!-- DataTables -->
<script src="{{ asset('/admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin-lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="../../dist/js/demo.js"></script>--}}
@yield('scripts')
<script>
    $('#logoutButton').on('click', function (event) {
        event.preventDefault();
        $('#logoutForm').submit();
    });
</script>
</body>
</html>

