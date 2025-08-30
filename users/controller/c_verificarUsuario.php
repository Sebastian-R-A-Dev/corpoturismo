<?php
include "../model/conexion_bd.php";
$usuario_existe = false;
$sql = "SELECT userId FROM usuario WHERE userId = :userId";
$consulta = $conexion->prepare($sql);
$consulta->bindParam(":userId",$user_id);
$consulta->execute();
$respuesta = $consulta->fetchAll();
foreach($respuesta as $rpt) {
    $usuario_existe = true;
}
if(!$usuario_existe) {
    ?>
    <script>
        errorUsuarioEliminado();
    </script>
    <?php
}
?>