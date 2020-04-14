@extends('layouts.main')

@section('title', 'Pedidos')

@section('content-title', 'Mis pedidos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Se mostrarán todos los pedidos...
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>fecha</th>
                            <th>hora</th>
                            <th>total</th>
                            <th>estado</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date->format('Y-m-d') }}</td>
                                <td>{{ $order->date->format('h:i a') }}</td>
                                <td class="text-right">$ {{ convertir_a_numero($order->total) }}</td>
                                <td class="text-center">{!! makeBadgeOrders($order->status) !!}</td>
                                <td class="text-right">
                                    <a href="{{ route('clients.order.show', $order) }}" class="btn btn-xs btn-primary"><i
                                            class="fas fa-eye"></i> Ver</a>
                                    @if ($order->status === 1)
                                        <a href="{{ route('clients.order.cancel', $order) }}" class="btn btn-xs btn-danger"
                                           id="cancelOrder" data-folio="{{ $order->id }}"><i class="fas fa-ban"></i>
                                            Cancelar</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No tienes ningún pedido</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $orders->links() }}
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
