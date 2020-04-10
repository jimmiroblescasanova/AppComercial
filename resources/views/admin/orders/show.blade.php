@extends('layouts.main')

@section('title', 'Pedidos')

@section('content-title', 'Detalles del pedido')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-primary mb-3"><i class="fas fa-table"></i> Movimientos</h3>
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
                                        <td class="text-right {{ ($order->status===1) ? 'row-price' : '' }}" data-id="{{ $row->id }}"
                                            data-price="{{ $row->price }}">$ {{ convertir_a_numero($row->price) }}
                                            {!! $order->status===1 ? '<i class="fas fa-pencil-alt fa-xs"></i>' : '' !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">$ <span id="total">{{ convertir_a_numero($order->total) }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-primary mb-3"><i class="fas fa-barcode"></i> Detalles</h3>
                    <div class="text-muted">
                        <p class="text-sm">Fecha del pedido:
                            <b class="d-block">{{ $order->date->format('d-m-Y') }}</b>
                        </p>
                        <p class="text-sm">Hora del pedido:
                            <b class="d-block">{{ $order->date->format('h:i a') }}</b>
                        </p>
                        <p class="text-sm">Nombre del cliente:
                            <b class="d-block">{{ $order->cliente->name }}</b>
                        </p>
                        <p class="text-sm">Estado del pedido:
                            <span class="d-block">{!! makeBadgeOrders($order->status) !!}</span>
                        </p>
                    </div>
                    <div class="text-center mt-5">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-link"><i
                                class="far fa-hand-point-left"></i> Atrás</a>
                        <a href="{{ route('admin.orders.print', $order->id) }}" class="btn btn-sm btn-default" target="_blank"><i
                                class="far fa-print"></i> Imprimir</a>
                        @if ($order->status != 0)
                            @if ($order->status === 1)
                                <a href="{{ route('admin.orders.atender', $order) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-thumbs-up"></i> Atender</a>
                                <button class="btn btn-sm btn-warning" id="updateTotal"><i
                                        class="far fa-sync"></i> Actualizar total</button>
                            @elseif($order->status === 2)
                                <a href="{{ route('admin.orders.completar', $order) }}"
                                   class="btn btn-sm btn-success"><i class="fas fa-check-double"></i> Completar</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#updateTotal').hide();
        });

        $('#updateTotal').on('click', function () {
            const token = $('meta[name="csrf-token"]').attr('content');
            const route = "{{ route('ajax.updateTotal') }}";
            const order_id = '{{ $order->id }}';

            $.ajax({
                type: 'POST',
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    id: order_id,
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#total').text(addCommas(data.total.toFixed(2)));
                    $('#updateTotal').hide();
                },
                error: function (data) {
                    console.log('error: ' + data);
                },
            });
        });

        $(document).on('click', '.row-price', function () {
            const row = $(this);
            const price = row.attr('data-price');
            let html = '<input type="text" class="form-control new-price" value="' + price + '" autofocus>';
            // console.log(row);
            row.html(html);
        });

        $('.row-price').keypress(function (e) {
            const row = $(this);
            let newPrice = parseFloat(row.find('input').val());
            let html = '$ ' + addCommas(newPrice.toFixed(2)) + ' <i class="fas fa-pencil-alt fa-xs"></i>';

            if (e.which === 13) {
                const token = $('meta[name="csrf-token"]').attr('content');
                const route = "{{ route('ajax.changePrice') }}";

                $.ajax({
                    type: 'POST',
                    url: route,
                    headers: {'X-CSRF-TOKEN': token},
                    data: {
                        id: $(this).data('id'),
                        price: newPrice,
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        row.attr('data-price', newPrice);
                        row.html(html);
                        $('#updateTotal').show();
                    },
                    error: function (data) {
                        console.log('error: ' + data);
                    },
                });
            }
        });
        // Función para validar el input
        $(document).on('keydown', function () {
            $(".new-price").inputFilter(function (value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value);
            });
        });
        // Restricts input for each element in the set of matched elements to the given inputFilter.
        (function ($) {
            $.fn.inputFilter = function (inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));

        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
@stop
