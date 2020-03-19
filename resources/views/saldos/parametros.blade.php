@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Reporte de Saldos Vencidos</h4>
                    <form action="{{ route('saldos.reporte') }}" role="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fecha">Fecha de corte:</label>
                            <input class="form-control" type="date" name="fecha" id="fecha" required>
                        </div>
                        <div class="form-gruop">
                            <label for="agente">Agente de cobro:</label>
                            <select class="form-control" name="agente" id="agente">
                                @foreach ($agentes as $id => $agente)
                                    <option value="{{ $id }}">{{ $agente }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-block btn-primary" value="Ejecutar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
