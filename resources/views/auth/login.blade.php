<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Iniciar sesíón | Mercalub</title>

{{-- Bootstrap assets --}}
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<script src="{{ asset('/js/app.js') }}" defer></script>

<style>
   html,
   body {
      height: 100%;
   }

   body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
   }

   .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
   }
   .form-signin .checkbox {
      font-weight: 400;
   }
   .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
   }
   .form-signin .form-control:focus {
      z-index: 2;
   }
   .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
   }
   .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
   }

   .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
   }

   @media (min-width: 768px) {
      .bd-placeholder-img-lg {
         font-size: 3.5rem;
      }
   }
</style>
</head>
<body class="text-center">
   <form class="form-signin" action="{{ route('authenticate') }}" method="POST">
      @csrf
      <img class="mb-4" src="{{ asset('/logo.png') }}" alt="" height="72">

      <h1 class="h3 mb-3 font-weight-normal">Por favor ingresa tus credenciales</h1>
      <label for="inputEmail" class="sr-only">Correo electrónico</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Correo" value="{{ old('email') }}" autofocus>
      {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}

      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña">
      {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}

      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <a class="btn btn-block btn-link">Registrarme</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
   </form>
</body>
</html>
