<?php
include "../model/conexion_bd.php";
$sql = "SELECT imagen as i FROM recaladas";
$query = $conexion->prepare($sql);
$query->execute();
$listaImagenes = $query->fetchAll();
$query->closeCursor();
foreach($listaImagenes as $img) {
    $primerImagen = $img['i'];
}
?>