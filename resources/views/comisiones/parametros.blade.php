@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('comisiones.reporte') }}" method="POST">
            @csrf
            <select class="form-control" name="id_agente" id="agente">
                @foreach ($agentes as $key => $agente)
                <option value="{{ $key }}">{{ $agente }}</option>
                @endforeach
            </select>
            <input class="form-control" type="date" name="fecha_inicial">
            <input class="form-control" type="date" name="fecha_final">
            <input class="btn btn-block btn-primary" type="submit" value="Enviar">
        </form>
    </div>
</div>
@endsection
