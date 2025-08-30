<?php include "templates/cabecera.php"; ?>
<?php 
    include "controller/c_usuarioRegistrado.php";
?>
<?php if ($resultados) {?>
<div class="box-details">
    <div class="box-table-usuarioRegistrado">
        <div class="caja-titulo-u-r">
            <span class="titulo-u-r">Usuarios</span>
            <span>Registro de todos los usuarios en la aplicación</span>
        </div>
        <table class="table table-secondary table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Correo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Imagen</th>
                    <th>Cedula</th>
                    <th>Rnt</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th><i class="fa-sharp fa-solid fa-sliders"></i></th>
                </tr>
            </thead>
            <tbody class="fw-normal">
                <?php foreach ($resultados as $rst){
                    $userName = $rst['er_nombre'] . " ".$rst['sec_nombre'];
                    ?>
                <tr>
                    <td><?php echo $rst['userId']?></td>
                    <td><?php echo $rst['loginId']?></td>
                    <td>
                        <?php echo $rst['er_nombre']?>&nbsp;
                        <?php echo $rst['sec_nombre']?>
                    </td>
                    <td>
                        <?php echo $rst['er_apellido']?>&nbsp;
                        <?php echo $rst['sec_apellido']?>
                    </td>
                    <td>
                        <img src="../home/session/images/<?php echo $rst['imagen_guia'] ? $rst['imagen_guia'] : 'imagen_por_defecto_usuario.png' ?>"
                            width="50" class="rounded">
                    </td>
                    <td><?php echo $rst['cedula']?></td>
                    <td><?php echo $rst['rnt'];?></td>
                    <td>
                        <?php echo $rst['rol'] === 'SUPER_USUARIO' ? 'SUPER USUARIO' : $rst['rol'];?>
                    </td>
                    <td><?php echo $rst['estado']?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="usId" value="<?php echo $rst['userId']?>">
                            <button <?php if($user_id==$rst['userId']) echo "disabled";?>
                                class="btn btn-small btn-danger"
                                onclick="return confirmEliminarUsuario('<?php echo $userName;?>')" type="submit"
                                name="accion" value="delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                onclick="return confirmModificarUsuario('<?php echo $userName;?>')"
                                data-bs-target="#uUsuarioRegistrado<?php echo $rst['userId'];?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <!--modal to update the usuario registrado-->
                            <?php include "u_usuario_registrado_modal.php";?>
                        </form>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php }else{ ?>
<div class="g-box">
    <span class="no-recalada">Ningun usuario registrado</span>
</div>
<?php } ?>
<?php include "templates/pie.php"; ?>