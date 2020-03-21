@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <p class="display-4">Inicio</p>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            Reporte de comisiones del mes
                            <a href="{{ route('comisiones.parametros') }}">Ejecutar</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Reporte de cartera vencida (global)
                            <a href="{{ route('saldos.parametros') }}">Ejecutar</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            Reporte de cartera vencida (detallado por cliente)
                            <a href="">Ejecutar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
