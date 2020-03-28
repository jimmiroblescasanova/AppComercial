@extends('layouts.main')

@section('content-title', 'Inicio')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            Bienvenido al admin site: {{ Auth::guard('admin')->user()->email }}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
@endsection
