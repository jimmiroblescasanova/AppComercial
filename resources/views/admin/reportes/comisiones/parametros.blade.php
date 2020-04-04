@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Comisiones del mes
                </div>
                <div class="card-body">
                    <form role="form" action="{{ route('admin.reportes.comisiones.reporte') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="agente">Nombre del agente:</label>
                            <select class="form-control select2" name="id_agente" id="agente" required>
                                @foreach ($agentes as $key => $agente)
                                    <option value="{{ $key }}">{{ $agente }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="startDate">Fecha inicial:</label>
                                <input class="form-control" type="date" id="startDate" name="fecha_inicial" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endDate">Fecha final:</label>
                                <input class="form-control" type="date" id="endDate" name="fecha_final" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit">Ejecutar</button>
                            <a class="btn btn-link btn-block" href="{{ route('admin.dashboard') }}">Atrás</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            locale: 'es-es',
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            // minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            locale: 'es-es',
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
@stop

