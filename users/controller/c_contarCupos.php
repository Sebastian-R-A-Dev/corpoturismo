<?php
$sql = "SELECT COUNT(*) as 'totalInscritos' FROM r_inscripcion 
        WHERE id_recalada = :id_rcd AND r_inscripcion.fecha_i = :fecha";

$query = $conexion->prepare($sql);
$query->bindParam(':id_rcd',$id_recalada);
$query->bindParam(':fecha', $time);
$query->execute();
$resultado_contador = $query->fetchAll();
$query->closeCursor();

foreach($resultado_contador as $rc) {
        $cuposUsados = $rc['totalInscritos'];
}        

?>