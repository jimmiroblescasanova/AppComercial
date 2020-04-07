@extends('layouts.main')

@section('title', 'Agentes')

@section('content-title', 'Cambiar contraseña')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de edición</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.agents.change-password', $id) }}" method="POST">
                @csrf @method('patch')
                <div class="form-group">
                    <label for="password">Nueva contraseña:</label>
                    <input type="password" class="form-control" name="password" id="password">
                    {!! $errors->first('password', '<span class="text-muted">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmación:</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-success btn-block"><i class="fas fa-check-circle"></i>
                        Cambiar contraseña
                    </button>
                    <button onclick="history.back();return false;" class="btn btn-link btn-block">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@stop
