@extends('layouts.main')

@section('content')
    Bienvenido al admin site {{ Auth::guard('admin')->user()->email }}
@endsection
