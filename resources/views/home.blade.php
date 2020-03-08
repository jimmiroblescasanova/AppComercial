@extends('layouts.main')

@section('content')
<form action="{{ route('agentes.reporte') }}" method="POST">
    @csrf
    <select name="id_agente" id="agente">
    @foreach ($agentes as $key => $agente)
    <option value="{{ $key }}">{{ $agente }}</option>
    @endforeach
    </select>
    <br>
    <input type="date" name="fecha_inicial">
    <br>
    <input type="date" name="fecha_final">
    <br>
    <input type="submit" value="Enviar">
</form>
@endsection
