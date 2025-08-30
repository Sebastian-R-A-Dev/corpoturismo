<?php
include "../model/conexion_bd.php";
$sql = "SELECT recaladas.nombre as recalda_nombre, usuario.er_nombre, usuario.sec_nombre,
        usuario.er_apellido, usuario.sec_apellido, usuario.imagen_guia, cedula_rnt.rnt, 
        cedula_rnt.cedula, r_inscripcion.fecha_i, r_inscripcion.hora_i, r_inscripcion.observacion, 
        r_inscripcion.estado_ins FROM r_inscripcion 
        INNER JOIN recaladas ON recaladas.id = r_inscripcion.id_recalada 
        INNER JOIN usuario ON usuario.userId = r_inscripcion.id_usuario 
        INNER JOIN cedula_rnt ON cedula_rnt.id = usuario.cedula_rnt_id;";
$query = $conexion->prepare($sql);
$query->execute();
$resultado = $query->fetchAll();
$query->closeCursor();
?>