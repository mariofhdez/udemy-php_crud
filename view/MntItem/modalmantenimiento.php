<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="item_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdl-titulo"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="item_id" name="item_id">

                    <div class="form-group">
                        <label class="form-label" for="item_name">Nombre</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Ingrese Nombre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
