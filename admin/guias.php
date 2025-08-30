<?php
include "templates/cabecera.php";
include "controller/c_guias.php";
if ($resultado) {
    ?>
    <div class="caja-general-g-r">
        <div class="sub-caja-g-r">
            <div class="caja-titulo-g-r">
                <span class="titulo-g-r">Guias</span>
                <span>Lista de guias inscritos en las recaldas</span>
            </div>
            <div class="guias_button_pdf">
                <a class="btn btn-dark btn-sm" href="pdf/registros_pdf.php?filtroSimple=todo" target="_blank">
                    Generar &nbsp;<i class="fa-solid fa-file-pdf fa-1x"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-secondary table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Recalada</th>
                            <th>Rnt</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Guia</th>
                            <th>Inscripción</th>
                            <th>Observación</th>
                            <th>Est.inscripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultado as $rst) { ?>
                            <tr>
                                <td><?php echo $rst['recalda_nombre']; ?></td>
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
                                    <img src="../home/session/images/<?php echo $rst['imagen_guia'] ?>" width="50"
                                        class="rounded">
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
    <!-- Librería html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="scripts/generatePDFScript.js"></script>
    <?php
} else {
    ?>
    <div class="caja-titulo-g-r no-registro-g-r">
        <span class="titulo-g-r">Guias</span>
        <span>Ningun guia inscrito en las recaladas.</span>
    </div>
    <?php
}
include "templates/pie.php";
?>