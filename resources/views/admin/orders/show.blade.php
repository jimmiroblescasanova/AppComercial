@extends('layouts.main')

@section('title', 'Pedidos')

@section('content-title', 'Detalles del pedido')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="row justify-content-between">
                        <div class="col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Productos</span>
                                    <span class="info-box-number text-center text-muted mb-0">0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ convertir_a_numero($order->total) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>nombre</th>
                                    <th>cantidad</th>
                                    <th>unidad</th>
                                    <th>precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orderRows as $row)
                                    <tr>
                                        <td>{{ $row->product }}</td>
                                        <td>{{ $row->quantity }}</td>
                                        <td>{{ $row->unit }}</td>
                                        <td>{{ $row->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-primary mb-3"><i class="fas fa-barcode"></i> Pedido</h3>
                    <h5 class="text-muted">Detalles del pedido:</h5>
                    <div class="text-muted">
                        <p class="text-sm">Fecha del pedido:
                            <b class="d-block">{{ $order->date->format('d-m-Y') }}</b>
                        </p>
                        <p class="text-sm">Nombre del cliente:
                            <b class="d-block">{{ $order->cliente->name }}</b>
                        </p>
                        <p class="text-sm">Estado del pedido:
                            <span class="d-block">{!! makeBadgeOrders($order->status) !!}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
