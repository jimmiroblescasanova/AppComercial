@extends('layouts.main')

@section('content')
<div class="row">
   <div class="col-12 col-sm-12">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
               Comisiones del mes
               <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Opciones
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.comisiones.export', [$data->id_agente, $data->fecha_inicial, $data->fecha_final]) }}">Exportar XLS</a>
                    </div>
               </div>
            </h4>
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
                  <table class="table dt-responsive display" id="dataTable" style="width:100%">
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
      </div>
   </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
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
