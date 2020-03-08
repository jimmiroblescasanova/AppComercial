@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>cliente</th>
                        <th>saldo total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentos as $documento)
                        <tr>
                            <td>{{ $documento->CRAZONSOCIAL }}</td>
                            <td>{{ convertir_a_numero($documento->saldo_total) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection