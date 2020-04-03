@extends('layouts.main')

@section('title', 'Pedidos')

@section('content-title', 'Pedidos de mis clientes')

@section('content')
    <div class="card">
        <div class="card-header">
            Se muestran los pedidos de mis clientes
        </div>
        <div class="card-body">
            <table class="table table-striped dt-responsive" id="dataTable" style="width: 100%;">
                <thead>
                <tr>
                    <th></th>
                    <th>id</th>
                    <th>fecha</th>
                    <th>cliente</th>
                    <th>total</th>
                    <th>estado</th>
                    <th>opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td></td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date->format('Y-m-d') }}</td>
                        <td>{{ $order->cliente->name }}</td>
                        <td class="text-right">$ {{ convertir_a_numero($order->total) }}</td>
                        <td class="text-center">{!! makeBadgeOrders($order->status) !!}</td>
                        <td class="text-right">
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order) }}"><i class="fas fa-eye"></i> Ver</a>
                            @if ($order->status === 1)
                                <a class="btn btn-xs btn-danger" href="{{ route('admin.orders.cancelar', $order) }}"><i class="fas fa-ban"></i> Cancelar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    @if (session()->has('success'))
        @include('partials.alerts.toast-success')
    @endif
    @include('partials.dataTables')
@stop
