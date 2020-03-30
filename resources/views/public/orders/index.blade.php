@extends('layouts.main')

@section('title', 'Pedidos')

@section('content-title', 'Mis pedidos')

@section('content')
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
                            <td></td>
                            <td class="text-center">{{ makeBadgeOrders(1) }}</td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-primary"><i class="fas fa-eye"></i> Ver</button>
                                <button class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i> Borrar</button>
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
@stop
