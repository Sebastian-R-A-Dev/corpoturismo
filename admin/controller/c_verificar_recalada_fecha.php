<?php
if($time == $fechaFinal) {
    $sql = "UPDATE `recaladas` SET estado= 'Desactivado' WHERE id = :id";
    $peticion = $conexion->prepare($sql);
    $peticion->bindParam(":id", $recaladaId);

    if($peticion->execute()) {
        $peticion->closeCursor();
    }
}


?>