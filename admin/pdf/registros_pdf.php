<?php
session_start();
if ($_SESSION['rol'] === 'USER') {
    header('Location:../../users/index.php');
}

$recalada = $_GET['recalada'] ?? "";
$recaladaNombre = $_GET['nombre'] ?? "";
$filtroSimple = $_GET['filtroSimple'] ?? "";
$fechaDesde = $_GET['fechaDesde'] ?? "";
$fechaHasta = $_GET['fechaHasta'] ?? "";
include "../../model/conexion_bd.php";

$sql = "SELECT r_inscripcion.fecha_i, r_inscripcion.observacion, r_inscripcion.estado_ins, 
r_inscripcion.estado_trabajo, usuario.er_nombre, usuario.sec_nombre, 
usuario.er_apellido, usuario.sec_apellido, cedula_rnt.cedula,cedula_rnt.rnt,
recaladas.nombre as recalada
FROM r_inscripcion 
INNER JOIN usuario ON r_inscripcion.id_usuario = usuario.userId 
INNER JOIN cedula_rnt ON cedula_rnt.id = usuario.cedula_rnt_id 
INNER JOIN recaladas ON recaladas.id = r_inscripcion.id_recalada";

if ($recalada && $recaladaNombre) {
    $sql .= " WHERE recaladas.id =" . $recalada;
} else {
    $recalada = "";
    $recaladaNombre = "";
}

if ($filtroSimple === "true") {
    date_default_timezone_set("America/Bogota");
    $time = date("Y-m-d");
    $sql .= " AND fecha_i = :fecha_actual";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':fecha_actual', $time);
} else if ($filtroSimple == "todo") {
    $consulta = $conexion->prepare($sql);
} else {
    $sql .= " AND DATE(fecha_i) BETWEEN :f_desde AND :f_hasta";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':f_desde', $fechaDesde);
    $consulta->bindParam(':f_hasta', $fechaHasta);
}

$consulta->execute();
$respuesta = $consulta->fetchAll();
$consulta->closeCursor();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Reporte PDF</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        .box-title {
            text-align: center;
            font-style: italic;
        }

        th {
            font-size: 10px;
            text-align: center;
        }

        td {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div id="contenido-pdf">
        <div class="box-title">
            <h3>Historial estado laboral</h3>
            <?php if ($filtroSimple != "todo") { ?>
                <div>
                    <h5><?php echo $filtroSimple === "true" ? $time : $fechaDesde . "/" . $fechaHasta ?></h5>
                    <h6><?php echo $recaladaNombre == null ? "Historial general" : $recaladaNombre; ?></h6>
                </div>
            <?php } ?>
        </div>
        <div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Cedula</th>
                        <th>Rnt</th>
                        <th>Recalada</th>
                        <th>Inscripción</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Observaciones</th>
                        <th>Inscripción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($respuesta as $rta) { ?>
                        <tr>
                            <td><?= $rta['cedula'] ?></td>
                            <td><?= $rta['rnt'] ?></td>
                            <td><?= $rta['recalada'] ?></td>
                            <td><?= $rta['fecha_i'] ?></td>
                            <td><?= $rta['er_nombre'] . " " . $rta['sec_nombre'] ?></td>
                            <td><?= $rta['er_apellido'] . " " . $rta['sec_apellido'] ?></td>
                            <td><?= $rta['observacion'] ?></td>
                            <td><?= $rta['estado_ins'] ?></td>
                            <td><?= $rta['estado_trabajo'] == null ? "Ninguno" : $rta['estado_trabajo'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts necesarios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        window.onload = function () {
            const element = document.getElementById('contenido-pdf');
            const opt = {
                margin: 0.5,
                filename: 'reporte.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
            };

            // Descargar automáticamente el PDF
            html2pdf().set(opt).from(element).save().then(() => {
                // Cerrar la pestaña que generó el PDF
                window.close();
            });
        }
    </script>

</body>

</html>