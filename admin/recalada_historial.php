<?php
include "templates/cabecera.php";
include "controller/c_recalada_historial.php";
?>

<div class="caja-general-g-r">
    <div class="sub-caja-g-r">
        <div class="caja-titulo-g-r">
            <span class="titulo-g-r"><?php echo $nombreRecalada; ?></span>
            <span>Consulte su historial de inscripciones.</span>
        </div>
        <form method="POST">
            <div class="historial-inputs">
                <div class="historial-input">
                    <div class="mb-3">
                        <label class="form-label">Desde</label>
                        <input name="desde" type="date" max="<?php echo $fechaAyer; ?>" class="form-control" />
                        <small class="text-muted">Filtro de fecha</small>
                    </div>
                </div>
                <div class="historial-input">
                    <div class="mb-3">
                        <label class="form-label">Hasta</label>
                        <input name="hasta" type="date" max="<?php echo $fechaAyer; ?>" value="<?php echo $fechaAyer; ?>" class="form-control" />
                        <small class="text-muted">Filtro de fecha</small>
                    </div>
                </div>
                <div class="historial-botones">
                    <input type="submit" name="accion" class="btn btn-dark" value="Buscar" />
                </div>
            </div>
            <?php if ($mostrarTabla && $resultado) {  ?>
                <a class="btn btn-dark btn-sm margin-bo-1por" href="pdf/registros_pdf.php?recalada=<?php echo $numeroRecalada; ?>&nombre=<?php echo $nombreRecalada; ?>&filtroSimple=false&fechaDesde=<?php echo $desde; ?>&fechaHasta=<?php echo $hasta; ?>" target="blank">
                    Generar &nbsp;
                    <i class="fa-solid fa-file-pdf fa-1x"></i>
                </a>
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
            <?php } else { ?>
                <div class="historial-no-filtro">
                    <span>No hay resultados con este filtro.</span>
                </div>
            <?php } ?>
        </form>
    </div>
</div>




<?php include "templates/pie.php"; ?>