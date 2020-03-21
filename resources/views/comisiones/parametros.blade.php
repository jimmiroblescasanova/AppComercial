@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Comisiones del mes</h4>
                <form role="form" action="{{ route('comisiones.reporte') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="agente">Nombre del agente:</label>
                        <select class="form-control" name="id_agente" id="agente">
                            @foreach ($agentes as $key => $agente)
                            <option value="{{ $key }}">{{ $agente }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicial">Fecha inicial:</label>
                        <input class="form-control" type="date" name="fecha_inicial">
                    </div>
                    <div class="form-group">
                        <label for="fecha_final">Fecha final:</label>
                        <input class="form-control" type="date" name="fecha_final">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-primary" type="submit" value="Enviar">
                        <a class="btn btn-link btn-block" href="{{ route('home') }}">Atrás</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
