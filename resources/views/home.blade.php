@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('user-icon.png') }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                        <p class="text-muted text-center">{{ Auth::user()->rfc }}</p>

                        <strong><i class="fas fa-mail-bulk mr-1"></i> Email</strong>
                        <p class="text-muted">
                            {{ Auth::user()->email }}
                        </p>
                        <hr>

                        <strong><i class="fas fa-receipt mr-1"></i> Uso de CFDi</strong>
                        <p class="text-muted">
                            {{ Auth::user()->uso_cfdi }}
                        </p>
                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> Teléfono</strong>
                        <p class="text-muted">
                            {{ Auth::user()->phone }}
                        </p>
                        <hr>

                        <strong><i class="fas fa-user-tie mr-1"></i> Agente</strong>
                        <p class="text-muted">
                            {{ Auth::user()->agente->CNOMBREAGENTE }}
                        </p>
                        <hr>

                        <a href="{{ route('clients.edit') }}" class="btn btn-primary btn-block">Modificar datos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Últimos pedidos
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Última actualización</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td scope="row"><a href="{{ route('clients.order.show', $order) }}">{{ $order->id }}</a></td>
                                    <td>{{ $order->date->format('d-m-Y') }}</td>
                                    <td>$ {{ convertir_a_numero($order->total) }}</td>
                                    <td>{{ $order->date->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hay órdenes actualmente.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
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
