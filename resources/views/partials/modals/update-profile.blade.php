<div class="modal fade" tabindex="-1" id="updateProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modificar mi perfil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('clients.update', $cliente) }}" method="POST">
                @csrf @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre o razón social</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" value="{{ Auth::user()->rfc }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">
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
