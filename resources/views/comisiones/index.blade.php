@extends('layouts.main')


@section('content')
<p>Agente: {{ $agente->CNOMBREAGENTE }}</p>
<p>Comision cobro: {{ $agente->CCOMISIONCOBROAGENTE }}%</p>
Resultados:
<table>
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
                <td>{{ $documento->CFECHA }}</td>
               <td>{{ $documento->CSERIEDOCUMENTO }}</td>
               <td>{{ $documento->CFOLIO }}</td>
               <td>{{ $documento->CRAZONSOCIAL }}</td>
               <td>{{ $documento->concepto->CNOMBRECONCEPTO }}</td>
               <td>{{ $documento->CTOTAL }}</td>
               <td>{{ $documento->comision() }}</td>
           </tr>
        @endforeach
    </tbody>
</table>
<p>Totales: {{ $total_general }}</p>
<p>Comisiones: {{ $total_general*0.03 }}</p>
@endsection
