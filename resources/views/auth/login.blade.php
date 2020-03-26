@extends('layouts.auth')

@section('content')

@if(session()->has('info'))
   <div class="alert alert-info" role="alert">
     {{ session('info') }}
   </div>
@endif
<form action="{{ route('validate') }}" method="POST">
   @csrf
   <img class="mb-4" src="{{ asset('/logo.png') }}" alt="" height="72">

   <h1 class="h3 mb-3 font-weight-normal">Login de clientes</h1>
   <label for="email" class="sr-only">Correo electrónico</label>
   <input type="email" id="email" class="form-control" name="email" placeholder="Correo" value="{{ old('email', 'jimmirobles@icloud.com') }}" autofocus>
   {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}

   <label for="inputPassword" class="sr-only">Contraseña</label>
   <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña" value="password">
   {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}

   <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
   <a href="{{ route('register') }}" class="btn btn-block btn-link">Registrarme</a>
   <a href="{{ route('admin.login') }}" class="btn btn-block btn-link">Soy colaborador</a>
   <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</form>

@endsection
