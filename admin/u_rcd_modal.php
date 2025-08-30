<!-- Modal -->
<div class="modal fade" id="uRecalada<?php echo $recalada['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recalada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" readonly name="id" value="<?php echo $recalada['id']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" value="<?php echo $recalada['r_n']?>" class="form-control" name="name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Imagen</label>
                        <br />
                        <img src="images/<?php echo $recalada['i']?>" width="100" class="rounded">
                        <input accept="image/png,image/jpeg" type="file" class="form-control" name="imagen">
                    </div>
                    <div class="mb-3">
                        <label>Fecha Inicio</label>
                        <input type="date" value="<?php echo $recalada['f_i']?>" class="form-control" name="f_i"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Fecha Final</label>
                        <input type="date" value="<?php echo $recalada['f_f']?>" class="form-control" name="f_f"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Tripulantes</label>
                        <input type="number" value="<?php echo $recalada['trip']?>" class="form-control" name="t_p" required>
                    </div>
                    <div class="mb-3">
                        <label>Pasajeros</label>
                        <input type="number" value="<?php echo $recalada['psj']?>" class="form-control" name="p_j" required>
                    </div>
                    <div class="mb-3">
                        <label>Cupos</label>
                        <input type="number" value="<?php echo $recalada['c_p']?>" class="form-control" name="c_p"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Estado</label>
                        <select class="form-select" value="<?php echo $recalada['est']?>" name="est" required>
                            <option <?php echo $recalada['est'] === 'Activo' ? 'selected' : ''?> value="Activo">Activo</option>
                            <option <?php echo $recalada['est'] === 'Inactivo' ? 'selected' : ''?>  value="Inactivo">Inactivo</option>
                            <option <?php echo $recalada['est'] === 'Desactivado' ? 'selected' : ''?>  value="Desactivado">Desactivado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="d_p" rows="2"><?php echo $recalada['descri']?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="accion" value="update" class="btn btn-success">Modificar
                        Recalada</button>
                    <button type="submit" name="accion" value="updateImg" class="btn btn-primary">Modificar
                        Imagen</button>
                </div>
            </form>
        </div>
    </div>
</div>