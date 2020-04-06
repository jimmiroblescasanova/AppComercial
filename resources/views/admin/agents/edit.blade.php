@extends('layouts.main')

@section('title', 'Agentes')

@section('content-title', 'Editar agente')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de edición</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.agents.update', $agente) }}" method="POST">
                @csrf @method('patch')
                <div class="form-group">
                    <label for="name">Nombre del agente:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $agente->name) }}">
                    {!! $errors->first('name', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $agente->email) }}">
                    {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="comercial">Asociar al sistema:</label>
                    <select class="form-control select2" name="agent_id" id="comercial">
                        @forelse ($agentes as $id => $nombre)
                            <option value="{{ $id }}" {{ ($id == $agente->agent_id) ? 'selected' : '' }}>{{ $nombre }}</option>
                        @empty
                            <option value="">Sin agentes</option>
                        @endforelse
                    </select>
                    {!! $errors->first('agent_id', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success btn-block"><i class="fas fa-check-circle"></i>
                        Guardar
                    </button>
                    <button onclick="history.back();return false;" class="btn btn-link btn-block">Cancelar</button>
                </div>
            </form>
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
