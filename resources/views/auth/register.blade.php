@extends('layouts.auth')

@section('content')
    <div class="login-logo">
        <a href="/"><b>Mercalub</b> Registro</a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Formulario de registro</p>

            <form action="{{ route('register.store') }}" method="POST" novalidate>
                @csrf
                <div class="input-group mb-3">
                    <label for="name" class="sr-only">Nombre completo o razón social</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                           placeholder="Nombre completo o razón social"
                           value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="input-group mb-3">
                    <label for="rfc" class="sr-only">RFC</label>
                    <input type="text"
                           name="rfc"
                           id="rfc"
                           class="form-control {{ $errors->first('rfc') ? 'is-invalid' : '' }}"
                           placeholder="RFC"
                           value="{{ old('rfc') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-fingerprint"></span>
                        </div>
                    </div>
                    {!! $errors->first('rfc', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="input-group mb-3">
                    <label for="phone" class="sr-only">Teléfono</label>
                    <input type="number"
                           name="phone"
                           id="phone"
                           class="form-control {{ $errors->first('phone') ? 'is-invalid' : '' }}"
                           placeholder="Teléfono"
                           value="{{ old('phone') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                    {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="input-group mb-3">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email"
                           class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                           name="email"
                           id="email"
                           placeholder="Email"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="input-group mb-3">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password"
                           class="form-control  {{ $errors->first('password') ? 'is-invalid' : '' }}"
                           name="password"
                           id="password"
                           placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
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

                <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
                <a href="{{ route('clients.home') }}" class="btn btn-link btn-block">Atrás</a>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@stop
