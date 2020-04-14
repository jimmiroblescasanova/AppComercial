@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">
                            Comisiones del mes
                        </h3>
                        <a class="btn btn-xs btn-success"
                           href="{{ route('admin.comisiones.export', [$data->id_agente, $data->fecha_inicial, $data->fecha_final]) }}"><i class="fas fa-download  "></i> Exportar
                            XLS</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <table class="table table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th colspan="2">Totales generales</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Agente:</td>
                                    <td class="text-right">{{ $agente->CNOMBREAGENTE }}</td>
                                </tr>
                                <tr>
                                    <td>Totales:</td>
                                    <td class="text-right">$ {{ convertir_a_numero($total_general) }}</td>
                                </tr>
                                <tr>
                                    <td>Comisiones:</td>
                                    <td class="text-right">$ {{ convertir_a_numero($total_general*0.03) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table dt-responsive display" id="dataTable" data-order='[[ 1, "asc" ]]'
                                   style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>fecha</th>
                                    <th>serie</th>
                                    <th>folio</th>
                                    <th>cliente</th>
                                    <th>concepto</th>
                                    <th>subtotal</th>
                                    <th>comisión</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($documentos as $documento)
                                    <tr>
                                        <td></td>
                                        <td>{{ $documento->CFECHA->format('Y-m-d') }}</td>
                                        <td>{{ $documento->CSERIEDOCUMENTO }}</td>
                                        <td>{{ $documento->CFOLIO }}</td>
                                        <td>{{ $documento->CRAZONSOCIAL }}</td>
                                        <td>{{ $documento->concepto->CNOMBRECONCEPTO }}</td>
                                        <td class="text-right">$ {{ convertir_a_numero($documento->CTOTAL/1.16) }}</td>
                                        <td class="text-right">$ {{ convertir_a_numero($documento->comision()) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary btn-sm float-right" onclick="history.back();return false;"><i
                            class="fas fa-hand-point-left"></i> Atrás
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.dataTables')
@endsection
