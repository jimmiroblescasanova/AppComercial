@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <p>Agente: {{ $agente->CNOMBREAGENTE }}</p>
    <p>Comision cobro: {{ $agente->CCOMISIONCOBROAGENTE }}%</p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>fecha</th>
          <th>serie</th>
          <th>folio</th>
          <th>cliente</th>
          <th>concepto</th>
          <th>total</th>
          <th>comision $</th>
       </tr>
    </thead>
    <tbody>
     @foreach ($documentos as $documento)
     <tr>
       <td>{{ $documento->CFECHA->format('d-m-Y') }}</td>
       <td>{{ $documento->CSERIEDOCUMENTO }}</td>
       <td>{{ $documento->CFOLIO }}</td>
       <td>{{ $documento->CRAZONSOCIAL }}</td>
       <td>{{ $documento->concepto->CNOMBRECONCEPTO }}</td>
       <td>{{ convertir_a_numero($documento->CTOTAL) }}</td>
       <td>{{ convertir_a_numero($documento->comision()) }}</td>
    </tr>
    @endforeach
  </tbody>
  </table>
  <p>Totales: {{ $total_general }}</p>
  <p>Comisiones: {{ $total_general*0.03 }}</p>
</div>
</div>
@endsection
