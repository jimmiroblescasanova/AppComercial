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
