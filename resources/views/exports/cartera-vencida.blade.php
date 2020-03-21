<table class="table dt-responsive display" id="dataTable" style="width:100%">
    <thead>
        <tr>
            <th>codigo</th>
            <th>cliente</th>
            <th>saldo total</th>
            <th>comision perdida</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($documentos as $documento)
            <tr>
                <td>{{ $documento->cliente->CCODIGOCLIENTE }}</td>
                <td>{{ $documento->CRAZONSOCIAL }}</td>
                <td>{{ $documento->saldo_total }}</td>
                <td>{{ $documento->saldo_total*0.02 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
