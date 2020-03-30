@extends('layouts.main')

@section('title', 'Crear Pedido')

@section('content-title', 'Crear un nuevo pedido')

@section('content')
    <div class="card">
        <div class="card-body">
            <p>Este formato es para agilizar el proceso de pedido y cotización de clientes de Mercalub.</p>
            <p>Aqui van las condiciones...</p>
            <div class="row">
                <div class="form-group col-md-7">
                    <label for="producto" class="col-form-label">Seleccionar producto:</label>
                    <select id="producto" class="form-control select2">
                        <option value="1">Producto 1</option>
                        <option value="2">Producto 2</option>
                        <option value="3">Producto 3</option>
                        <option value="4">Producto 4</option>
                        <option value="5">Producto 5</option>
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
                                <th style="width: 60%;">productos</th>
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
                <button class="btn btn-primary btn-sm" id="sendForm"><i class="fas fa-check"></i> Terminar</button>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('/admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });


        $(document).on('click', '#agregarProducto', function () {
            const row = $('#tableContent');
            let html = '<tr>';
            html += '<td><input type="text" class="form-control form-control-sm" style="width: 100%;" name="producto[]" value="' + $('#producto option:selected').text() + '" readonly></td>';
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
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            });
            let empty = false;

            if (allInputs.length > 0) {
                allInputs.each(function () {
                    if ($(this).val().length === 0) {
                        Toast.fire({
                            type: 'warning',
                            title: 'La cantidad no puede quedar vacía.'
                        });
                        empty = true;
                        return false;
                    }
                });
                if (!empty) {
                    $('#order').submit();
                }
            } else {
                Toast.fire({
                    type: 'error',
                    title: 'Debes agregar al menos un producto.'
                });
            }
        });

        $(document).on('keydown', function () {
            $(".currencyTextBox").inputFilter(function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value);
            });
        });

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
