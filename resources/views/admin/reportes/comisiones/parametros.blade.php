@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Comisiones del mes
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('admin.reportes.comisiones.reporte') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="agente">Nombre del agente:</label>
                        <select class="form-control select2" name="id_agente" id="agente" required>
                            @foreach ($agentes as $key => $agente)
                                <option value="{{ $key }}">{{ $agente }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicial">Fecha inicial:</label>
                        <input class="form-control" type="date" id="fecha_inicial" name="fecha_inicial" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_final">Fecha final:</label>
                        <input class="form-control" type="date" id="fecha_final" name="fecha_final" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Ejecutar</button>
                        <a class="btn btn-link btn-block" href="{{ route('admin.dashboard') }}">Atrás</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
    </script>
@stop

