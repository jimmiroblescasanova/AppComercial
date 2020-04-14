@extends('layouts.main')

@section('content-title', 'Clientes')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table dt-responsive display" id="dataTable" data-order='[[ 1, "asc" ]]' style="width:100%;">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>RFC</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Lista de precios</th>
                                    <th>Agente</th>
                                    <th>Activo</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->rfc }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->price_list }}</td>
                                        <td>
                                            @if ($user->agent_id != 0)
                                                {{ $user->agente->CNOMBREAGENTE }}
                                            @else
                                                <span class="badge badge-danger">Sin asignar</span>
                                            @endif
                                        </td>
                                        <td>{!! makeBadgeStatus($user->active) !!}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-xs btn-info dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    @if ($user->active)
                                                        <a class="dropdown-item" href="{{ route('admin.users.activate', $user->id) }}">Suspender</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('admin.users.activate', $user->id) }}">Activar
                                                            cliente</a>
                                                    @endif
                                                    <a href="#"
                                                       class="dropdown-item"
                                                       data-cliente="{{ $user->id }}"
                                                       data-toggle="modal"
                                                       data-target="#modal-default"
                                                    >Cambiar agente</a>
                                                    <a href="#"
                                                       class="dropdown-item"
                                                       data-cliente="{{ $user->id }}"
                                                       data-toggle="modal"
                                                       data-target="#modal-precios"
                                                    >Asignar lista</a>
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
        </div>
    </div>
    @include('partials.modals.select-agent')
    @include('partials.modals.price-list', ['route' => route('admin.users.changePrice')])
@endsection

@section('scripts')
    @if(session()->has('success'))
        @include('partials.alerts.toast-success')
    @endif

    @include('partials.dataTables')

    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });

        $('#modal-default').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const cliente = button.data('cliente');
            const modal = $(this);

            modal.find('input[name="user"]').val(cliente);
        });

        $('#modal-precios').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const cliente = button.data('cliente');
            const modal = $(this);

            modal.find('input[name="user"]').val(cliente);
        });
    </script>
@endsection
