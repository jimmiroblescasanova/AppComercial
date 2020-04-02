@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-12 col-md-4 mb-3">
                    <p class="h3">Reporte concentrado por cliente</p>
                    <a class="btn btn-sm btn-success btn-block-xs-only"
                       href="{{ route('admin.saldos.export', [$data["agente"], $data["fecha"]]) }}"
                    ><i class="fas fa-file-excel"></i> Exportar XLS</a>
                </div>
                <div class="col-12 col-md-4">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center">Totales</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Saldo global:</td>
                            <td class="text-right">$ {{ convertir_a_numero($pendienteTotal) }}</td>
                        </tr>
                        <tr>
                            <td>2% cartera vencida:</td>
                            <td class="text-right">$ {{ convertir_a_numero($pendienteTotal*0.02) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <table class="table dt-responsive display" id="dataTable" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th>codigo</th>
                    <th>cliente</th>
                    <th>saldo total</th>
                    <th>comision perdida</th>
                    <th>accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td></td>
                        <td>{{ $documento->cliente->CCODIGOCLIENTE }}</td>
                        <td>{{ $documento->CRAZONSOCIAL }}</td>
                        <td class="text-right">{{ convertir_a_numero($documento->saldo_total/1.16) }}</td>
                        <td class="text-right">{{ convertir_a_numero( ($documento->saldo_total/1.16) *0.02) }}</td>
                        <td class="text-right"><a
                                href="{{ route('admin.documentos.ver', $documento->CIDCLIENTEPROVEEDOR) }}"
                                class="btn btn-primary btn-sm">Ver doctos</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                },
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                    className: 'control',
                    orderable: false,
                    targets: 0
                }],
                order: [1, 'asc'],
            });
        });
    </script>
@endsection
