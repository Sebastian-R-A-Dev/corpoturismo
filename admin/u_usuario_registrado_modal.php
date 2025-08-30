<!-- Modal -->
<div class="modal fade" id="uUsuarioRegistrado<?php echo $rst['userId'];?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuario Registrado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" readonly name="usId" value="<?php echo $rst['userId']?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Primer nombre</label>
                        <input type="text" required value="<?php echo $rst['er_nombre']?>" name="er_nombre"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Segundo nombre</label>
                        <input type="text" value="<?php echo $rst['sec_nombre']?>" name="sec_nombre"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Primer apellido</label>
                        <input type="text" required value="<?php echo $rst['er_apellido']?>" name="er_apellido"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Segundo apellido</label>
                        <input type="text" required value="<?php echo $rst['sec_apellido']?>" name="sec_apellido"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Correo</label>
                        <input type="email" required value="<?php echo $rst['loginId']?>" name="email"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Rol</label>
                        <select class="form-select" name="rol" required>
                            <option <?php echo $rst['rol'] === 'SUPER_USUARIO' ? 'selected' : ''?> value="SUPER_USUARIO">SUPER USUARIO</option>
                            <option <?php echo $rst['rol'] === 'ADMIN' ? 'selected' : ''?> value="ADMIN">ADMIN</option>
                            <option <?php echo $rst['rol'] === 'USER' ? 'selected' : ''?> value="USER">USER</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Estado</label>
                        <select class="form-select" name="estado" required>
                            <option <?php echo $rst['estado'] === 'Activo' ? 'selected' : ''?> value="Activo">Activo</option>
                            <option <?php echo $rst['estado'] === 'Inactivo' ? 'selected' : ''?> value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Cedula</label>
                        <input type="number" readonly value="<?php echo $rst['cedula']?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Rnt</label>
                        <input type="text" readonly value="<?php echo $rst['rnt']?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="accion" value="modificarU" class="btn btn-success">
                        Modificar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>