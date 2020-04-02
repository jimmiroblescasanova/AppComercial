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
                            <th>nombre</th>
                            <th>rfc</th>
                            <th>email</th>
                            <th>agente</th>
                            <th>activo</th>
                            <th>opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->rfc }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->agent_id != 0)
                                        {{ $user->agente->CNOMBREAGENTE }}
                                    @else
                                        <span class="badge badge-danger">Sin asignar</span>
                                    @endif
                                </td>
                                <td>{!! $user->makeBadge() !!}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-info dropdown-toggle" type="button"
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
                                            <a href="#"
                                                class="dropdown-item"
                                                data-cliente="{{ $user->id }}"
                                                data-toggle="modal"
                                                data-target="#modal-default"
                                            >Cambiar agente</a>
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
    <div class="modal fade" tabindex="-1" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Asignar agente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('admin.users.agent-assoc') }}" method="POST">
                @csrf
                <input type="hidden" name="user" value="">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="agente">Seleccionar un agente:</label>
                      <select class="form-control select2" name="agente" id="agente">
                        @forelse ($agents as $id => $nombre)
                            <option value="{{ $id }}">{{ $nombre }}</option>
                        @empty
                            <option value="">No existen agentes creados</option>
                        @endforelse
                      </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection

@section('scripts')
    @if(session()->has('success'))
        @include('partials.alerts.toast-success')
    @endif

    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });

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

        $('#modal-default').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var cliente = button.data('cliente'); // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('input[name="user"]').val(cliente);
        });
    </script>
@endsection
