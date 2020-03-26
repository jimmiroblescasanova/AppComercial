@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>email</th>
                                <th>activo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($users as $user)
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{!! $user->makeBadge() !!}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection