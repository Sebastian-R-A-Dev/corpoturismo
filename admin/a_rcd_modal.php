<!-- Modal -->
<div class="modal fade" id="aRecalda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recalada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label>Imagen</label>
                        <input accept="image/png,image/jpeg" type="file" class="form-control" name="imagen" >
                    </div>
                    <div class="mb-3">
                        <label>ETA</label>
                        <input type="date" class="form-control" name="f_i" required>
                    </div>
                    <div class="mb-3">
                        <label>ETD</label>
                        <input type="date" class="form-control" name="f_f" required>
                    </div>
                    <div class="mb-3">
                        <label>Tripulantes</label>
                        <input type="number" class="form-control" name="t_p" required>
                    </div>
                    <div class="mb-3">
                        <label>Pasajeros</label>
                        <input type="number" class="form-control" name="p_j" required>
                    </div>
                    <div class="mb-3">
                        <label>Cupos</label>
                        <input type="number" class="form-control" name="c_p" required>
                    </div>
                    <div class="mb-3">
                        <label>Estado</label>
                        <select class="form-select" name="est" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Desactivado">Desactivado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="d_p" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="accion" value="add" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>