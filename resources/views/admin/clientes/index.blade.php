@extends('layouts.main')

@section('content-title', 'Clientes')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table dt-responsive display" id="dataTable" style="width:100%;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>id</th>
                            <th>nombre</th>
                            <th>rfc</th>
                            <th>email</th>
                            <th>código comercial</th>
                            <th>activo</th>
                            <th>opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->rfc }}</td>
                                <td>{{ $user->email }}</td>
                                <td></td>
                                <td>{!! $user->makeBadge() !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-info dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if ($user->active)
                                                <a class="dropdown-item" href="{{ route('admin.users.activate', $user->id) }}">Suspender</a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('admin.users.activate', $user->id) }}">Activar
                                                    cliente</a>
                                            @endif
                                            @if ($user->code==null)
                                                <a class="dropdown-item" href="#">Asignar código</a>
                                            @else
                                                <a class="dropdown-item" href="#">Editar código</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(session()->has('success'))
        @include('partials.alerts.toast-success')
    @endif
    <script>
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
    </script>
@endsection
