<table class="table">
    <thead>
        <tr>
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
            <td>{{ $documento->CFECHA->format('d/m/Y') }}</td>
            <td>{{ $documento->concepto->CNOMBRECONCEPTO }}</td>
            <td>{{ $documento->CSERIEDOCUMENTO }}</td>
            <td>{{ $documento->CFOLIO }}</td>
            <td>{{ $documento->agente->CNOMBREAGENTE }}</td>
            <td class="text-right">{{ $documento->CTOTAL }}</td>
            <td class="text-right">{{ $documento->CPENDIENTE }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
