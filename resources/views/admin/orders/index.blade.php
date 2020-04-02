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
                    <th>estado</th>
                    <th>opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td></td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->cliente->name }}</td>
                        <td class="text-center">{!! makeBadgeOrders($order->status) !!}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <button class="btn btn-xs btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('admin.orders.show', $order) }}"><i class="fas fa-eye"></i> Ver</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> Modificar</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-ban"></i> Cancelar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    @include('partials.dataTables')
@stop
