<?php
include "templates/cabecera.php";
include "controller/c_guias_recalada.php";
if ($resultado) {
?>
    <div class="caja-general-g-r">
        <div class="sub-caja-g-r">
            <div class="caja-titulo-g-r">
                <span class="titulo-g-r"><?php echo $nombreRecalada; ?></span>
                <span>Lista de usuarios inscritos a esta recalda</span>
            </div>
            <form method="POST">
                <div class="guias_button_pdf">
                    <!--<button type="submit" name="accion" onclick="return confirmLimpiarInscripciones('<?php echo $nombreRecalada ?>')" value="limpiar" class="btn btn-dark btn-sm">
                        Limpiar Inscripciones-->
                    <a class="btn btn-dark btn-sm" href="pdf/registros_pdf.php?recalada=<?php echo $numeroRecalada; ?>&nombre=<?php echo $nombreRecalada ?>&filtroSimple=true" target="blank">
                        Generar &nbsp;
                        <i class="fa-solid fa-file-pdf fa-1x"></i>
                    </a>
                    <a class="btn btn-dark btn-sm" href="recalada_historial.php?recalada=<?php echo $numeroRecalada; ?>&nombre=<?php echo $nombreRecalada ?>">
                        Historial &nbsp;
                        <i class="fa-regular fa-calendar-days"></i>
                    </a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-secondary table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Rnt</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Guia</th>
                            <th>Fecha inscripción</th>
                            <th>Observación</th>
                            <th>Estado inscripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $rst) { ?>
                            <tr>
                                <td><?php echo $rst['rnt']; ?></td>
                                <td><?php echo $rst['cedula']; ?></td>
                                <td>
                                    <?php echo $rst['er_nombre']; ?>
                                    <?php echo $rst['sec_nombre']; ?>
                                </td>
                                <td>
                                    <?php echo $rst['er_apellido']; ?>
                                    <?php echo $rst['sec_apellido']; ?>
                                </td>
                                <td>
                                    <!--home es la ruta de las imagenes para usuarios-->
                                    <img src="../home/session/images/<?php echo $rst['imagen_guia'] ?>" width="50" class="rounded">
                                </td>
                                <td>
                                    <?php echo $rst['fecha_i']; ?>
                                    <?php echo $rst['hora_i']; ?>
                                </td>
                                <td><?php echo $rst['observacion']; ?></td>
                                <td><?php echo $rst['estado_ins']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="caja-titulo-g-r no-registro-g-r">
        <span class="titulo-g-r"><?php echo $nombreRecalada; ?></span>
        <span>Ningun usuario inscrito en esta recalada hoy.</span>
    </div>
    <div class="no-data-guias_button_pdf">
        <a class="btn btn-dark btn-sm" href="recalada_historial.php?recalada=<?php echo $numeroRecalada; ?>&nombre=<?php echo $nombreRecalada ?>">
            Historial &nbsp;
            <i class="fa-regular fa-calendar-days"></i>
        </a>
    </div>
<?php
}
include "templates/pie.php";
?>