@extends('layouts.auth')

@section('title', 'Acceso de clientes')

@section('content')
    <div class="login-logo">
        <a href="#"><b>Mercalub</b> Clientes</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Por favor, inicia sesión</p>

            <form action="{{ route('validate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <label for="email" class="sr-only">Correo electrónico</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Correo"
                           value="{{ old('email', 'jimmirobles@icloud.com') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="input-group mb-3">
                    <label for="password" class="sr-only">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                           value="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- Otras opciones -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fas fa-user-circle mr-2"></i> Registrarme
                </a>
                <a href="{{ route('admin.login') }}" class="btn btn-block btn-danger">
                    <i class="fas fa-users-cog mr-2"></i> Soy colaborador
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">Olvidé mi contraseña</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
