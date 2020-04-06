@extends('layouts.auth')

@section('title', 'Cambio de contraseña')

@section('content')
    <div class="login-logo">
        <a href="#"><b>Mercalub</b> <br>Cambio de contraseña</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Por favor, ingresa tu nueva contraseña</p>

            <form action="{{ route('password.new-password', $token) }}" method="post">
                @csrf
                {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}
                <div class="input-group mb-3">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password"
                           class="form-control"
                           name="password"
                           id="password"
                           placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label for="password_confirmation" class="sr-only">Confirmación</label>
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           id="password_confirmation"
                           placeholder="Confirmación">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Cambiar mi contraseña</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@stop
