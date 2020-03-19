@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
                Desglose de documentos pendientes
                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('documentos.export', $id) }}">Exportar XLS</a>
                    {{-- <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a> --}}
                    </div>
                </div>
            </h4>
            <div class="">
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
                            <td class="text-right">{{ convertir_a_numero($documento->CTOTAL) }}</td>
                            <td class="text-right">{{ convertir_a_numero($documento->CPENDIENTE) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td class="text-right">TOTALES:</td>
                        <td class="text-right"><strong>{{ convertir_a_numero($total) }}</strong></td>
                        <td class="text-right"><strong>{{ convertir_a_numero($pendiente) }}</strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.20/sorting/datetime-moment.js"></script>
    <script>
        $(document).ready( function () {
            $.fn.dataTable.moment( 'HH:mm MMM D, YY' );

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
                    targets:   0
                }],
                order: [ 1, 'asc' ],
            });
        });
    </script>
@endsection
