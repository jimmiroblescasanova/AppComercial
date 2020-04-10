@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h2>Hola, {{ Auth::user()->name }}</h2>
                    <p>Mi agente de venta asignado: {{ Auth::user()->agente->CNOMBREAGENTE }}</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @if(session()->has('success'))
        @include('partials.alerts.toast-success')
    @endif
@stop
