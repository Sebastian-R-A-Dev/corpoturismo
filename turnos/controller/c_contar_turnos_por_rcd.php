<?php
include "../model/conexion_bd.php";
$inscritos = 0;
$sql = "SELECT COUNT(*) AS 'total_inscritos' 
FROM r_inscripcion WHERE id_recalada=:id_r AND r_inscripcion.fecha_i = :fecha";
$query = $conexion->prepare($sql);
$query->bindParam(':id_r',$recaladaId);
$query->bindParam(":fecha", $time);
$query->execute();
$totalInscritos = $query->fetchall();
$query->closeCursor();
foreach($totalInscritos as $total) {
    $inscritos = $total['total_inscritos'];
}

?>