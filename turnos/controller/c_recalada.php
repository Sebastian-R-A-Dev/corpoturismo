<?php
include "../model/conexion_bd.php";
$sql = "SELECT id, nombre AS n_r, imagen AS i FROM recaladas";
$query = $conexion->prepare($sql);
$query->execute();
$resultados = $query->fetchall();
$query->closeCursor();

date_default_timezone_set("America/Bogota");
$time = date ("Y-m-d");
$fechaSiguiente = date("Y-m-d", strtotime($time. ' +1 day'));
?>