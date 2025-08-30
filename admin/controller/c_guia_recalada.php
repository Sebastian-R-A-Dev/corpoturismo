<?php
include "../model/conexion_bd.php";
$sql = "SELECT id, imagen as i, nombre as n_r, f_registro as f_r 
FROM recaladas";
$query = $conexion->prepare($sql);
$query->execute();
$resultados = $query->fetchAll();
$query->closeCursor();

date_default_timezone_set("America/Bogota");
$time = date ("Y-m-d");

$fechaSiguiente = date("Y-m-d", strtotime($time. ' +1 day'));
?>