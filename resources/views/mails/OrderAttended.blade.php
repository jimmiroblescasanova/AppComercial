@component('mail::message')
# Pedido atendido

Tu pedido ha sido atendido por el agente de venta. <br>
ID: {{ $order->id }} <br>
Total: $ {{ convertir_a_numero($order->total) }}

@component('mail::button', ['url' => ''])
Ver orden
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
