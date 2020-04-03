@component('mail::message')
# Pedido completado

Tu pedido con ID: {{ $orden->id }} ha sido completada. <br/>
El total es de: $ {{ convertir_a_numero($orden->total) }}.

@component('mail::button', ['url' => ''])
Ver pedido
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
