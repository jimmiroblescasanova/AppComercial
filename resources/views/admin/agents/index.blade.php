@extends('layouts.main')

@section('title', 'Agentes')

@section('content-title', 'Lista de agentes')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <a href="{{ route('admin.agents.create') }}" class="btn btn-sm btn-primary"><i
                        class="fas fa-pencil-alt"></i> Nuevo</a>
            </div>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>agente comercial</th>
                    <th>nombre</th>
                    <th>email</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($agents as $agent)
                    <tr>
                        <td>{{ $agent->agente->CNOMBREAGENTE }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->email }}</td>
                        <td class="text-right">
                            <button class="btn btn-xs btn-secondary">Modificar</button>
                            <button class="btn btn-xs btn-danger">Suspender</button>
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
@stop

@section('scripts')
    @if(session()->has('success'))
        @include('partials.alerts.toast-success')
    @endif
@stop
