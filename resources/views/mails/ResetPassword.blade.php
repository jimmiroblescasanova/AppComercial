@component('mail::message')
# Cambio de contraseña

Has solicitado el cambio de tu contraseña, haz click en el botón de abajo para realizarlo.
Si no fuiste tu, puedes ignorar este correo.

@component('mail::button', ['url' => config('app.url').'/reset-password/'.$token])
Cambiar contraseña
@endcomponent

<small>Si el botón no funciona, copia y pega el enlace de abajo en tu navegador: {{ config('app.url').'/reset-password/'.$token }}</small>

Saludos,<br>
{{ config('app.name') }}
@endcomponent
