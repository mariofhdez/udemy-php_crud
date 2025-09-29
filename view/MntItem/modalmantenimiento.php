<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" id="item_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdl-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="item_id" name="item_id">

                    <div class="form-group">
                        <label class="form-label" for="item_name">Nombre</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Ingrese Nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="category_id">Categoría</label>
                        <select class="form-control select-2" name="category_id" id="category_id" data-placeholder="Seleccione"></select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="item_desc">Descripción</label>
                        <textarea rows=3 type="text" class="form-control" id="item_desc" name="item_desc" placeholder="Ingrese Descripción" required></textarea>
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
