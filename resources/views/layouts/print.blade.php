<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mercalub | Imprimir</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
    <h1 class="border-0 mb-3 text-center">PEDIDO</h1>
        <!-- title row -->
        <div class="row mb-1">
            <div class="col-12">
                <h2 class="page-header">
                    <i class="fas fa-globe"></i> {{ config('app.name') }}
                    <small class="float-right">Fecha: {{ NOW()->format('d-m-Y') }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Emisor
                <address>
                    <strong>MERCALUB SA DE CV</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Cliente
                <address>
                    <strong>{{ $order->cliente->name }}</strong><br>
                    {{--795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>--}}
                    Teléfono: {{ $order->cliente->phone }}<br>
                    Email: {{ $order->cliente->email }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Factura #007612</b><br>
                <br>
                <b>Pedido ID:</b> {{ $order->id }}<br>
                <b>Fecha de recepción:</b> {{ $order->date->format('d-m-Y') }}<br>
{{--                <b>Account:</b> 968-34567--}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Unidad</th>
                        <th>Producto</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderRows as $row)
                        <tr>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->unit }}</td>
                            <td>{{ $row->product }}</td>
                            <td>$ {{ convertir_a_numero($row->price) }}</td>
                            <td>$ {{ convertir_a_numero($row->quantity*$row->price) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row justify-content-end">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Políticas:</p>
                {{--<img src="../../dist/img/credit/visa.png" alt="Visa">
                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="../../dist/img/credit/american-express.png" alt="American Express">
                <img src="../../dist/img/credit/paypal2.png" alt="Paypal">--}}

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Todos los precios expresados en este documento incluyen IVA.
                </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Área de totales</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Total:</th>
                            <td>$ {{ convertir_a_numero($order->total) }}</td>
                        </tr>
                        {{--<tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                        </tr>--}}
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
</body>
</html>

