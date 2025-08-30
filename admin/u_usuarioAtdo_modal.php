<!-- Modal -->
<div class="modal fade" id="uUsuarioAtdo<?php echo $rst['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuario Autorizado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" readonly name="id" value="<?php echo $rst['id']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Cedula</label>
                        <input type="number" value="<?php echo $rst['cedula']?>" class="form-control" name="cedula"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Rnt</label>
                        <input type="number" value="<?php echo $rst['rnt']?>" class="form-control" name="rnt">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="accion" value="update" class="btn btn-success">
                        Modificar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>