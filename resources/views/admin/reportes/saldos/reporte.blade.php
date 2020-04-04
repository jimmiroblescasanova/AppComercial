@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Reporte concentrado por cliente</h3>
                <a class="btn btn-xs btn-success btn-block-xs-only"
                   href="{{ route('admin.saldos.export', [$data["agente"], $data["fecha"]]) }}"
                ><i class="fas fa-download"></i> Exportar XLS</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-end">
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
                    <th>código</th>
                    <th>cliente</th>
                    <th>saldo total</th>
                    <th>comisión perdida</th>
                    <th class="text-center">opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td></td>
                        <td>{{ $documento->cliente->CCODIGOCLIENTE }}</td>
                        <td>{{ $documento->CRAZONSOCIAL }}</td>
                        <td class="text-right">$ {{ convertir_a_numero($documento->saldo_total/1.16) }}</td>
                        <td class="text-right">$ {{ convertir_a_numero( ($documento->saldo_total/1.16) *0.02) }}</td>
                        <td class="text-right"><a
                                href="{{ route('admin.documentos.ver', $documento->CIDCLIENTEPROVEEDOR) }}"
                                class="btn btn-primary btn-xs">Ver doctos</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-secondary btn-sm float-right" onclick="history.back();return false;"><i
                    class="fas fa-hand-point-left"></i> Atrás</button>
        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.dataTables')
@endsection
