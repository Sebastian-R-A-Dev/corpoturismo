<!-- Modal -->
<div class="modal fade" id="uMiInfo<?php echo $user_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mi Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Primer Nombre</label>
                        <input type="text" value="<?php echo $cI['er_nombre'];?>" class="form-control" name="er_nombre"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Segundo Nombre</label>
                        <input type="text" value="<?php echo $cI['sec_nombre'];?>" class="form-control"
                            name="sec_nombre">
                    </div>
                    <div class="mb-3">
                        <label>Primer Apellido</label>
                        <input type="text" value="<?php echo $cI['er_apellido'];?>" class="form-control" name="er_ape"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Segundo Apellido</label>
                        <input type="text" value="<?php echo $cI['sec_apellido'];?>" class="form-control" name="sec_ape"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Mi correo</label>
                        <input type="email" value="<?php echo $cI['email'];?>" class="form-control" name="email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Mi perfil</label>
                        <br />
                        <img src="../home/session/images/users_img/<?php echo $cI['img']?>" width="15%" class="rounded">
                        <input accept="image/png,image/jpeg" type="file" class="form-control" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="accion" value="modificarInfo" class="btn btn-success btn-sm"
                        data-bs-dismiss="modal">Cambiar información</button>
                    <button type="submit" name="accion" value="modificarPerfil" class="btn btn-warning btn-sm">
                        Cambiar perfil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>