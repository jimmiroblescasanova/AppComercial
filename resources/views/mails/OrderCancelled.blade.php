@component('mail::message')
# Orden CANCELADA

La orden con ID: {{ $order->id }} ha sido cancelada.

@component('mail::button', ['url' => ''])
Ver orden
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
