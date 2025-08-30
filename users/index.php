<?php 
include "templates/cabecera.php";
include "controller/c_recalada.php"; 
?>
<?php if($recaladasLista) { ?>
<div class="container margin-top-4">
    <div class="recalada-caja-titulo">
        <h2>Recaladas Activas</h2>
        <div class="alert alert-primary alert-box" role="alert">
          Si ya te encuentras inscrito dale click a la recalada para ver los detalles!!
        </div>
    </div>
    <div class="caja-fechas-detalles">
        <span>Inscripciones de <?php echo $time;?></span>&nbsp&nbsp&nbsp
        <span>Proxima rotacion de inscripciones <?php echo $fechaSiguiente?></span>
    </div>
    <br>
    <div class="row">
        <?php foreach($recaladasLista as $recalada) { ?>
        <?php
            $id_recalada = $recalada['id'];
            $cupos_de_recalada = $recalada['cupo'];
            include "controller/c_contarCupos.php";
            include "controller/c_verificarInscripcion.php";
            if($recalada['estado']==='Inactivo') {
                $desabilitarButton = true;
            }
        ?>
        <div class="col-md-3 i-margin-botton-1">
            <div class="card <?php echo $mostrarSombra ? 'card-click' : '';?>" onclick="
            openDetailsRecalada('<?php echo $textoBotonInscribirse;?>', '<?php echo $recalada['nombre'];?>', '<?php echo $turnoDeLaRecalada;?>', '<?php echo $recalada['f_inicio'];?>', '<?php echo $recalada['f_final'];?>')">
                <img class="card-img-top" src="../admin/images/<?php echo $recalada['img'];?>" height="245px">
                <?php 
                if($recalada['estado']==='Inactivo') {
                ?>
                <div class="texto-centrado-img">Recalada temporalmente inactiva!</div>
                <?php
                }
                ?>
                <div class="card-body">
                    <div>
                        <span class="detalle-r">Recalada :</span>
                        <span class="texto-c-g-r"><?php echo $recalada['nombre'];?></span>
                    </div>
                    <div>
                        <span class="detalle-r">Inscritos :</span>
                        <span class="texto-c-g-r">
                            <?php echo $cuposUsados;?>
                            /
                            <?php echo $cupos_de_recalada?>
                        </span>
                    </div>
                    <div>
                        <form method="post">
                            <input type="hidden" name="nombre_rcd" value="<?php echo $recalada['nombre'];?>">
                            <input type="hidden" name="numero_rcd" value="<?php echo $recalada['id'];?>">
                            <button type="submit" class="btn btn-primary" name="accion" value="inscribir"
                                <?php echo $desabilitarButton ? 'disabled' : '';?>>
                                <?php echo $textoBotonInscribirse;?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php } else { ?>
<div class="no-recalada-i">
    <span class="titulo-i">Recaladas</span>
    <span>No hay recaldas activas en el momento.</span>
</div>
<?php } ?>
<?php include "templates/pie.php" ?>