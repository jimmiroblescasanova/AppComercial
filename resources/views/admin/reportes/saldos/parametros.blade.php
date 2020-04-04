@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Reporte de Cartera Vencida (Global)
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.reportes.saldos.reporte') }}" role="form" method="POST">
                    @csrf
                    <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label for="fecha">Fecha de corte:</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label for="agente">Agente de cobro:</label>
                            <select class="form-control select2" name="agente" id="agente" required>
                                @foreach ($agentes as $id => $agente)
                                    <option value="{{ $id }}">{{ $agente }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Ejecutar</button>
                            <a class="btn btn-link btn-block" href="{{ route('admin.dashboard') }}"
                               role="button">Atrás</a>
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
        $('#fecha').datepicker({
            locale: 'es-es',
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            // minDate: today,
            maxDate: today,
        });
    </script>
@stop
