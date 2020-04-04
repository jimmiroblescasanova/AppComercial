@component('mail::message')
# Mensaje recibido

El cliente {{ $msg['name'] }}, te ha dejado un mensaje.<br>

Asunto: {{ $msg['subject'] }} <br>
Mensaje: <br>
{{ $msg['message'] }}

Saludos,<br>
{{ config('app.name') }}
@endcomponent
