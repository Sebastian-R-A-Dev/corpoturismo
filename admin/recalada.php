<?php include "templates/cabecera.php" ?>

<div class="g-box">
    <!-- button to open the modal to add a new recalada -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#aRecalda">
        <i class="fa-solid fa-calendar-plus"></i> Añadir recalada
    </button>
</div>
<!--modal codice-->
<?php 
include "a_rcd_modal.php";
include "controller/c_recalada.php";
?>
<?php if($lista_recalada) { ?>
<div class="box-details">
    <div class="box-table table-responsive">
        <table class="table table-secondary table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Inicia</th>
                    <th>Finaliza</th>
                    <th>Descripcion</th>
                    <th>Tripulantes</th>
                    <th>Pasejeros</th>
                    <th>Cupos</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th><i class="fa-sharp fa-solid fa-sliders"></i></th>
                </tr>
            </thead>
            <tbody class="fw-normal">
                <?php foreach($lista_recalada as $recalada) {
                    $fechaFinal = $recalada['f_f'];
                    $recaladaEstado = $recalada['est'];
                    $recaladaId = $recalada['id'];
                ?>
                <?php include "controller/c_verificar_recalada_fecha.php";?>
                <tr>
                    <td><?php echo $recalada['id']?></td>
                    <td><?php echo $recalada['r_n']?></td>
                    <td>
                        <img src="images/<?php echo $recalada['i']?>" width="50" class="rounded">
                    </td>
                    <td><?php echo $recalada['f_i']?></td>
                    <td><?php echo $fechaFinal;?></td>
                    <td><?php echo $recalada['descri']?></td>
                    <td><?php echo $recalada['trip']?></td>
                    <td><?php echo $recalada['psj']?></td>
                    <td><?php echo $recalada['c_p']?></td>
                    <td><?php echo $recalada['u_name']?></td>
                    <td><?php echo $recaladaEstado;?></td>
                    <td>
                        <form id="formularioRecalada" method="POST">
                            <input type="hidden" readonly name="id" value="<?php echo $recalada['id']?>">
                            <input type="hidden" readonly name="name" value="<?php echo $recalada['r_n']?>">
                            <button onclick="return ConfirmarEliminar('<?php echo $recalada['r_n']?>')"
                                class="btn btn-small btn-danger" type="submit" name="accion" value="delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#uRecalada<?php echo $recalada['id'];?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </form>
                        <!--modal to update the recalda-->
                        <?php include "u_rcd_modal.php";?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php } else { ?>
<div class="g-box">
    <span class="no-recalada">No tienes recaladas.</span>
</div>
<?php }?>



<?php include "templates/pie.php" ?>