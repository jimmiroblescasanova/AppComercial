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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date"
                                       class="form-control"
                                       id="fecha"
                                       name="fecha"
                                       data-inputmask-alias="datetime"
                                       data-inputmask-inputformat="dd-mm-yyyy"
                                       data-mask>
                            </div>
                            <!-- /.input group -->
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
    <!-- InputMask -->
    <script src="{{ asset('/vendor/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });

        $('[data-mask]').inputmask();
    </script>
@stop
