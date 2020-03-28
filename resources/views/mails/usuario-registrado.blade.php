@component('mail::message')
# Notificación

Se ha realizado el registro de un nuevo cliente.

@component('mail::button', ['url' => ''])
Ir a clientes
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
