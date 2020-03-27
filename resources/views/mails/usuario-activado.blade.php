@component('mail::message')
# Introduction

Tu usuario ha sido activado.

@component('mail::button', ['url' => '#'])
Ingresar al portal
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
