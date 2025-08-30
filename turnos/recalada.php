
<?php include "templates/cabecera.php";
      include "controller/c_recalada.php"; 
?>
<div class="container">
    <br>
    <div class="caja-titulo">
        <span class="titulo-text">Recalas inscritas</span>
        <span class="detalles-text">Seleccione una para ver los turnos y usuarios, si este tiene usuarios inscritos!</span>
    </div>
    <div class="caja-fechas-detalles">
        <span>Inscripciones de <?php echo $time;?></span>&nbsp&nbsp&nbsp
        <span>Proxima rotacion de inscripciones <?php echo $fechaSiguiente?></span>
    </div>
    <div class="row">
        <?php if($resultados) {
            foreach($resultados as $rst) {
                $recaladaId = $rst['id'];
                include "controller/c_contar_turnos_por_rcd.php"
            ?>
        <div class="col-md-3 margen-carta"
            onclick="return cargarTurnosUsuariosPorRecalada('<?php echo $rst['id'];?>','<?php echo $rst['n_r'];?>', '<?php echo $inscritos;?>')">
            <div class="card card-click">
                <img class="card-img-top" src="../admin/images/<?php echo $rst['i'];?>" height="245px">
                <div class="card-body">
                    <div class="caja-detalles">
                        <div>
                            <span class="text-bold">Recalada :</span>
                            <span class="text-gray"><?php echo $rst['n_r'];?></span>
                        </div>
                        <div>
                            <span class="text-bold">Total Inscritos :</span>
                            <span class="text-gray"><?php echo $inscritos?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }
        } else { ?>
        <span class="no-recalada">No tienes recaladas.</span>
        <?php } ?>
    </div>
</div>
<?php include "templates/pie.php" ?>