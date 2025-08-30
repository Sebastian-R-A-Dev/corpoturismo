<?php
$numeroRecalada = $_GET['recalada'];
$nombreRecalada = $_GET['nombre'];
if($numeroRecalada && $nombreRecalada) {
    include "../model/conexion_bd.php";
    date_default_timezone_set("America/Bogota");
    $time = date ("Y-m-d");
    $sql = " SELECT 
    recaladas.nombre as recalda_nombre, 
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
    AND fecha_i = :fecha_actual";
    
    $query = $conexion->prepare($sql);
    $query->bindParam(':id_recalada', $numeroRecalada);
    $query->bindParam(':fecha_actual', $time);
    $query->execute();
    $resultado = $query->fetchall();
    $query->closeCursor();
} else {
    ?>
    <script>
        redirecionarNoRecaladaSelecionada();
    </script>
    <?php
}
//logica para limpiar las inscripciones de recaladas en especifico, 
//no podemos limpiar todo de una vez
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
if($accion=='limpiar') {
    $consulta = $conexion->prepare("DELETE FROM `r_inscripcion` WHERE `id_recalada`=:id_r");
    $consulta->bindParam(":id_r", $numeroRecalada);
    if($consulta->execute()) {
        $consulta->closeCursor();
        ?>
        <script>
            inscripcionesLimpiadas();
        </script>
        <?php
    }
}
?>