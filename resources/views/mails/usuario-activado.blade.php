@component('mail::message')
# Hola, {{ $usuario->name }}

Tu usuario ha sido activado. <br>
A partir de ahora podrás ingresar a realizar tus pedidos directamente en el portal de Mercalub.<br>
Recuerda que deberás iniciar sesión con los mismos datos con los que te registraste.<br>

@component('mail::button', ['url' => config('url')])
Ingresar
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
