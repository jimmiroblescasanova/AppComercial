@extends('layouts.main')

@section('content-title', 'Clientes')

@section('content')
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>rfc</th>
                    <th>email</th>
                    <th>codigo comercial</th>
                    <th>activo</th>
                    <th>opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
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
                                    Opt
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
@endsection
