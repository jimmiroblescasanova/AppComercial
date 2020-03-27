@extends('layouts.auth')

@section('content')
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Registro de cliente nuevo</h1>

        <div class="form-group">
            <label for="name" class="sr-only">Nombre completo o razón social</label>
            <input type="text"
            name="name"
            id="name"
            class="form-control"
            placeholder="Nombre completo o razón social"
            value="{{ old('name', 'jimmi robles') }}">
            {!! $errors->first('name', '<span class="text-muted">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="rfc" class="sr-only">RFC</label>
            <input type="text"
            name="rfc"
            id="rfc"
            class="form-control"
            placeholder="RFC"
            value="{{ old('rfc', 'rocj9002272x8') }}">
            {!! $errors->first('rfc', '<span class="text-muted">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="email" class="sr-only">Email</label>
            <input type="email"
            class="form-control"
            name="email"
            id="email"
            placeholder="Email"
            value="{{ old('email', 'jimmi@mail.com') }}">
            {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="password" class="sr-only">Contraseña</label>
            <input type="password"
            class="form-control"
            name="password"
            id="password"
            placeholder="Contraseña">
            {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="sr-only">Confirmación</label>
            <input type="password"
            class="form-control"
            name="password_confirmation"
            id="password_confirmation"
            placeholder="Confirmación">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
        <a href="{{ route('home') }}" class="btn btn-link btn-block">Atrás</a>
    </form>
@endsection
