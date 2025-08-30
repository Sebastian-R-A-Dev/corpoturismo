<?php include "templates/cabecera.php"; ?>

<div class="g-box-usuarioAtdo">
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#aUsuarioAtdo">
        <i class="fa-solid fa-user-plus"></i> Autorizar Usuario
    </button>
</div>
<?php 
    include "a_usuarioAtdo_modal.php";
    include "controller/c_usuarioAtdo.php";
?>

<?php if ($resultados) {?>


<div class="box-details">
    <div class="box-table-usuarioAtdo">
        <table class="table table-secondary table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Cedula</th>
                    <th>Rnt</th>
                    <th>Estado</th>
                    <th><i class="fa-sharp fa-solid fa-sliders"></i></th>
                </tr>
            </thead>
            <tbody class="fw-normal">
                <?php foreach ($resultados as $rst){?>
                <tr>
                    <td><?php echo $rst['id']?></td>
                    <td><?php echo $rst['cedula']?></td>
                    <td><?php echo $rst['rnt']?></td>
                    <td><?php echo $rst['estado']?></td>
                    <td class="td-15">
                        <form method="POST">
                            <input type="hidden" value="<?php echo $rst['id']?>" name="id">
                            <button class="btn btn-small btn-danger" onclick="return confirmarEliminarUATO(<?php echo $rst['cedula']?>,<?php echo $rst['rnt']?>)" type="submit" name="accion" value="delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#uUsuarioAtdo<?php echo $rst['id'];?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </form>
                        <!--modal to update the usuarioAtdo-->
                        <?php include "u_usuarioAtdo_modal.php";?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>



<?php }else{ ?>
<div class="g-box">
    <span class="no-recalada">Ningun usuario autorizado</span>
</div>
<?php } ?>


<?php include "templates/pie.php"; ?>