@extends('layouts.main')

@section('title', 'Agentes')

@section('content-title', 'Crear un agente nuevo')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.agents.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del agente:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    {!! $errors->first('name', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    {!! $errors->first('email', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="password">
                    {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmación:</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="comercial">Asociar al sistema:</label>
                    <select class="form-control select2" name="agent_id" id="comercial">
                        @forelse ($agentes as $id => $nombre)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @empty
                            <option value="">Sin agentes</option>
                        @endforelse
                    </select>
                    {!! $errors->first('id_comercial', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success btn-block"><i class="fas fa-check-circle"></i>
                        Guardar
                    </button>
                    <a href="{{ route('admin.agents.index') }}" class="btn btn-link btn-block">Cancelar</a>
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
