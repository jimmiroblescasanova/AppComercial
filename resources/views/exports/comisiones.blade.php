<table>
   <thead>
      <tr>
         <th>fecha</th>
         <th>serie</th>
         <th>folio</th>
         <th>cliente</th>
         <th>concepto</th>
         <th>total</th>
         <th>comision</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($documentos as $documento)
      <tr>
         <td>{{ $documento->CFECHA->format('d/m/Y') }}</td>
         <td>{{ $documento->CSERIEDOCUMENTO }}</td>
         <td>{{ $documento->CFOLIO }}</td>
         <td>{{ $documento->CRAZONSOCIAL }}</td>
         <td>{{ $documento->concepto->CNOMBRECONCEPTO }}</td>
         <td>{{ $documento->CTOTAL/1.16 }}</td>
         <td>{{ $documento->comision() }}</td>
      </tr>
      @endforeach
   </tbody>
</table>