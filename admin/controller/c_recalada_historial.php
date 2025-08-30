<?php
date_default_timezone_set("America/Bogota");
$time = date("Y-m-d");

$fechaAyer = strtotime('-1 day', strtotime($time));
$fechaAyer = date("Y-m-d", $fechaAyer);

$numeroRecalada = $_GET['recalada'];
$nombreRecalada = $_GET['nombre'];

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$desde = (isset($_POST['desde'])) ? $_POST['desde'] : "";
$hasta = (isset($_POST['hasta'])) ? $_POST['hasta'] : "";

$mostrarTabla = false;
$mostrarMensaje = false;

if ($accion === 'Buscar') {
    include "../model/conexion_bd.php";
    if ($desde && $hasta) {
        $mostrarTabla = true;
        $sql = " SELECT 
    recaladas.nombre as recalada_nombre, 
    usuario.er_nombre, usuario.sec_nombre, usuario.er_apellido, usuario.sec_apellido, 
    usuario.imagen_guia, cedula_rnt.rnt, cedula_rnt.cedula,
    r_inscripcion.fecha_i, r_inscripcion.hora_i, r_inscripcion.observacion, 
    r_inscripcion.estado_ins
    FROM r_inscripcion 
    INNER JOIN recaladas 
    ON recaladas.id = r_inscripcion.id_recalada 
    INNER JOIN usuario 
    ON usuario.userId = r_inscripcion.id_usuario
    INNER JOIN cedula_rnt
    ON cedula_rnt.id = usuario.cedula_rnt_id 
    WHERE id_recalada = :id_recalada
    AND DATE(fecha_i) BETWEEN :f_desde AND :f_hasta";

        $query = $conexion->prepare($sql);
        $query->bindParam(':id_recalada', $numeroRecalada);
        $query->bindParam(':f_desde', $desde);
        $query->bindParam(':f_hasta', $hasta);
        $query->execute();
        $resultado = $query->fetchall();
        $query->closeCursor();
    }
}
