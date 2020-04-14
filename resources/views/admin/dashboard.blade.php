@extends('layouts.main')

@section('title', 'Inicio')

@section('content-title', 'Página principal')

@section('content')
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Estado</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($today_orders as $order)
                                <tr>
                                    <td><a href="{{ route('admin.orders.show', $order) }}">{{ $order->id }}</a></td>
                                    <td>{{ $order->cliente->name }}</td>
                                    <td>{!! makeBadgeOrders($order->status) !!}</td>
                                    <td>{{ $order->date->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hay registros</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer-->
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $ordenes_recibidas }}</h3>
                        <p>Pedidos sin atender</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $ordenes_atendidas }}</h3>
                        <p>Pedidos pendientes por completar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $clientes }}</h3>
                        <p>Clientes registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.users') }}" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection
