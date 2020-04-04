@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Desglose de documentos pendientes</h3>
                <a class="btn btn-xs btn-success" href="{{ route('admin.documentos.export', $id) }}"><i class="fas fa-download"></i> Exportar XLS</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table dt-responsive display nowrap" id="dataTable" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th>fecha</th>
                    <th>concepto</th>
                    <th>serie</th>
                    <th>folio</th>
                    <th>agente</th>
                    <th>total</th>
                    <th>pendiente</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td></td>
                        <td>{{ $documento->CFECHA->format('Y-m-d') }}</td>
                        <td>{{ $documento->concepto->CNOMBRECONCEPTO }}</td>
                        <td>{{ $documento->CSERIEDOCUMENTO }}</td>
                        <td>{{ $documento->CFOLIO }}</td>
                        <td>{{ $documento->agente->CNOMBREAGENTE }}</td>
                        <td class="text-right">$ {{ convertir_a_numero($documento->CTOTAL) }}</td>
                        <td class="text-right">$ {{ convertir_a_numero($documento->CPENDIENTE) }}</td>
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
