<?php
include "../model/conexion_bd.php";
$numeroRecalada = $_GET['recalada'];
$nombreRecalada = $_GET['nombre'];

if($numeroRecalada && $nombreRecalada) {
    date_default_timezone_set("America/Bogota");
    $time = date ("Y-m-d");
    
    $sql = "SELECT r_inscripcion.id, er_nombre, sec_nombre, er_apellido, sec_apellido, 
    r_inscripcion.turno, r_inscripcion.estado_ins, r_inscripcion.observacion, r_inscripcion.estado_trabajo, r_inscripcion.fecha_i 
    FROM usuario INNER JOIN r_inscripcion ON usuario.userId = r_inscripcion.id_usuario 
    WHERE r_inscripcion.id_recalada = :id_rld AND r_inscripcion.fecha_i = :fecha ";
    $query = $conexion->prepare($sql);
    $query->bindParam(":id_rld", $numeroRecalada);
    $query->bindParam(":fecha", $time);
    if($query->execute()) {
        $listaDatos = $query->fetchAll();
        $query->closeCursor();
    }
} else {
?>
<script>
redireccionarTurnos();
</script>
<?php
}

if($_POST) {
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $estado_turno=(isset($_POST['estado_tur']))?$_POST['estado_tur']:"";
    $estado_trabajo=(isset($_POST['estado_trabajo']))?$_POST['estado_trabajo']:"";
    $id_turno = (isset($_POST['id']))?$_POST['id']:"";
    $obs = (isset($_POST['observacion_tur']))?$_POST['observacion_tur']:"";
    switch ($accion) {
        case 'update_turno':
            $sql = "UPDATE r_inscripcion SET estado_ins = :est_i, estado_trabajo = :est_t, observacion = :obs WHERE id = :id_t";
            $query = $conexion->prepare($sql);
            $query->bindParam(":est_i", $estado_turno);
            $query->bindParam(":est_t", $estado_trabajo);
            $query->bindParam(":id_t", $id_turno);
            $query->bindParam(":obs", $obs);
            if($query->execute()) {
                $query->closeCursor();
                ?>
                <script>
                    redirigirMismaPaginaActual('<?php echo $nombreRecalada?>', '<?php echo $numeroRecalada?>');
                </script>
                <?php
            }
            break;
    }
}
?>