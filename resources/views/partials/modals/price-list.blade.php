<div class="modal fade" tabindex="-1" id="modal-precios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lista de precios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ $route }}" method="POST">
                @csrf
                <input type="hidden" name="user" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="precios">Asignar una lista de precios:</label>
                        <select class="form-control select2" name="precios" id="precios">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">Lista de precios {{ $i }}</option>
                            @endfor
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
