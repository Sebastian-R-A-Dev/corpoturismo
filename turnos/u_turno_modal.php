<!-- Modal -->
<div class="modal fade" id="selecionar<?php echo $dataUsuario['id'];?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Turnos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" readonly name="id" value="<?php echo $dataUsuario['id']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Estado</label>
                        <select class="form-select" name="estado_tur" required>
                            <option <?php echo $dataUsuario['estado_ins'] === 'Asistio' ? 'selected' : ''?> value="Asistio">Asistio</option>
                            <option <?php echo $dataUsuario['estado_ins'] === 'No Asistio' ? 'selected' : ''?> value="No Asistio">No Asistio</option>
                            <option <?php echo $dataUsuario['estado_ins'] === 'Cancelado' ? 'selected' : ''?> value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" value="Trabajo" name="estado_trabajo" <?php echo $dataUsuario['estado_trabajo'] === 'Trabajo' ? 'checked' : ''?>>
                        <label class="form-check-label">Trabajo</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" value="No trabajo" name="estado_trabajo" <?php echo $dataUsuario['estado_trabajo'] === 'No trabajo' ? 'checked' : ''?>>
                        <label class="form-check-label">No trabajo</label>
                    </div>
                    <div class="mb-3">
                        <label>Observaciones:</label>
                        <textarea class="form-control" name="observacion_tur" rows="2"><?php echo $dataUsuario['observacion'];?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="accion" value="update_turno" class="btn btn-success">Cambiar estado</button>
                </div>
            </form>
        </div>
    </div>
</div>