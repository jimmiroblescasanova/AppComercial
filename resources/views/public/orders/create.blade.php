@extends('layouts.main')

@section('title', 'Crear Pedido')

@section('content-title', 'Crear un nuevo pedido')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <p>Este formato es para agilizar el proceso de pedido y cotización de clientes de Mercalub.</p>
                    <p>Aqui van las condiciones...</p></div>
                <div class="col-md-3 text-center">
                    <p class="h4">TOTAL</p>
                    <span class="h2">$ </span><span class="h2" id="grandTotal">0.00</span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-7">
                    <label for="producto" class="col-form-label">Seleccionar producto:</label>
                    <select id="producto" class="form-control select2">
                        @foreach ($productos as $id => $producto)
                            <option value="{{ $id }}">{{ $producto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-6 col-md-2">
                    <label for="precio" class="col-form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" readonly>
                </div>
                <div class="form-group col-6 col-md-2">
                    <label for="unidad" class="col-form-label">Unidad</label>
                    <input type="text" class="form-control" id="unidad" readonly>
                </div>
                <div class="form-group col-12 col-md-1 align-self-end">
                    <button class="btn btn-success btn-block" id="agregarProducto">Agregar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('clients.order.store') }}" method="post" id="order">
                        @csrf
                        <table class="table table-sm calculator">
                            <thead>
                            <tr>
                                <th style="width: 50%;">productos</th>
                                <th style="width: 10%">precio</th>
                                <th style="width: 20%;">unidad</th>
                                <th style="width: 10%">cantidad</th>
                                <th style="width: 10%">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="tableContent">
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button class="btn btn-primary btn-sm" id="calculateTotal"><i class="fas fa-calculator"></i> Calcular total</button>
                <button class="btn btn-success btn-sm" id="sendForm"><i class="fas fa-check"></i> Terminar</button>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('/admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
        });
        $('.select2').select2({
            theme: 'bootstrap4',
        });

        $(document).on('change', '#producto', function(){
            const id = $('#producto option:selected').val();
            console.log(id);
            const token = $('meta[name="csrf-token"]').attr('content');
            const route = "{{ route('ajax.price') }}";

            $.ajax({
                type: 'POST',
                url: route,
                headers: { 'X-CSRF-TOKEN': token },
                data: {
                    id: id,
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#precio').val(data.precio.toFixed(2));
                    $('#unidad').val(data.unidad);
                },
                error: function (data) {
                    console.log('error: '+data);
                },
            });
        });

        $(document).on('click', '#calculateTotal', function() {
            const grandTotal = $('#grandTotal');
            const allInputs = $('input[name^="cantidad"]');
            let cuenta = 0;

            let bool = allInputs.checkEmptyInput();

            if (bool) {
                let precios = $('input[name="precio[]"]').map(function(){
                    return $(this).val();
                }).get();

                let cantidades = $('input[name="cantidad[]"]').map(function(){
                    return $(this).val();
                }).get();

                for (let i = 0; i < precios.length; i++) {
                    cuenta = cuenta + (precios[i]*cantidades[i]);
                }
            }
            // console.log(cuenta);
            grandTotal.text(cuenta.toFixed(2));
        });

        $(document).on('click', '#agregarProducto', function () {
            const row = $('#tableContent');

            let html = '<tr>';
            html += '<td><input type="text" class="form-control form-control-sm" style="width: 100%;" name="producto[]" value="' + $('#producto option:selected').text() + '" readonly></td>';
            html += '<td><input type="text" class="form-control form-control-sm" style="width: 100%;" name="precio[]" value="'+ $('#precio').val() +'" readonly></td>';
            html += '<td><input type="text" class="form-control form-control-sm" style="width: 100%;" name="unidad[]" value="' + $('#unidad').val() + '" readonly></td>';
            html += '<td><input type="text" class="form-control form-control-sm currencyTextBox" style="width: 100%;" name="cantidad[]"></td>';
            html += '<td class="text-right"><button class="btn btn-danger btn-sm btnDelete"><i class="fas fa-trash-alt"></i></button></td>';
            html += '</tr>';

            row.append(html);
        });

        $(document).on('click', '.btnDelete', function () {
            $(this).closest('tr').remove();
        });

        $('#sendForm').on('click', function (e) {
            e.preventDefault();

            const allInputs = $('input[name^="cantidad"]');

            let bool = allInputs.checkEmptyInput();
            if (bool) {
                $('#order').submit();
            }
        });

        $(document).on('keydown', function () {
            $(".currencyTextBox").inputFilter(function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value);
            });
        });

        (function($){
            $.fn.checkEmptyInput = function() {
                var result = true;
                if (this.length > 0) {
                    this.each(function () {
                        if ($(this).val().length === 0) {
                            Toast.fire({
                                type: 'warning',
                                title: 'La cantidad no puede quedar vacía.'
                            });
                            result = false;
                            return result;
                        }
                    });
                } else {
                    Toast.fire({
                        type: 'error',
                        title: 'Debes agregar al menos un producto.'
                    });
                    result = false;
                    return result;
                }
                return result;
            };
        }(jQuery));

        // Restricts input for each element in the set of matched elements to the given inputFilter.
        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
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
    </script>
@stop
