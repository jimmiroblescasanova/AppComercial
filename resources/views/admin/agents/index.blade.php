@extends('layouts.main')

@section('title', 'Agentes')

@section('content-title', 'Lista de agentes')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="{{ route('admin.agents.create') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-pencil-alt"></i> Nuevo</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Agente Comercial</th>
                            <th>Email</th>
                            <th>Estatus</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($agents as $agent)
                            <tr>
                                <td>{{ $agent->name }}</td>
                                <td>{{ $agent->agente->CNOMBREAGENTE }}</td>
                                <td>{{ $agent->email }}</td>
                                <td>{!! makeBadgeStatus($agent->active) !!}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('admin.agents.edit', $agent) }}"
                                               class="dropdown-item"><i class="fas fa-pencil-alt"></i> Modificar</a>
                                            <a href="{{ route('admin.agents.password', $agent) }}"
                                               class="dropdown-item"><i class="fas fa-key"></i> Cambiar contraseña</a>
                                            @if ($agent->active)
                                                <a href="{{ route('admin.agents.updateStatus', $agent) }}"
                                                   class="dropdown-item"><i class="fas fa-lock"></i> Suspender</a>
                                            @else
                                                <a href="{{ route('admin.agents.updateStatus', $agent) }}"
                                                   class="dropdown-item"><i class="fas fa-lock-open"></i> Activar</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Ningún agente registrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
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
