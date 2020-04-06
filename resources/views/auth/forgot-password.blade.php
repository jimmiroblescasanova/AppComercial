@extends('layouts.auth')

@section('title', 'Recuperación de contraseña')

@section('content')
    <div class="login-logo">
        <a href="#"><b>Mercalub</b> <br>Recuperación de contraseña</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Por favor, ingresa tu correo electrónico</p>

            <form action="{{ route('password.validate-email') }}" method="post">
                @csrf
                {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}
                <div class="input-group mb-3">
                    <label for="email" class="sr-only">Correo electrónico</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Correo electrónico"
                           value="{{ old('email') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Enviar correo</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-0">
                <a href="{{ route('clients.home') }}">Atrás</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@stop
