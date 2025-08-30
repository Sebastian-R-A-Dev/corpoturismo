<?php
$textoBotonInscribirse = 'Inscribirse';
//necesitamos desabilitar el boton de inscribirse para los admin o super usuarios
//no permitido hacer inscripciones
$desabilitarButton = false;
//con esto verificamos si el admin o super usuario estan revisando el sitio we
//asi no degamos que se inscriba y genere un error no deseado
$desabilitarButton = $userRol === 'ADMIN' || $userRol === 'SUPER_USUARIO' ? true : false;
$mostrarSombra= false;
$turnoDeLaRecalada = 0;

$sql = "SELECT turno, estado_ins AS e_i, estado_trabajo AS e_t FROM r_inscripcion
        WHERE id_usuario = :u_id AND id_recalada = :r_id AND r_inscripcion.fecha_i = :fecha";

$query = $conexion->prepare($sql);
$query->bindParam(':u_id',$user_id);
$query->bindParam(':r_id',$id_recalada);
$query->bindParam(':fecha', $time);
$query->execute();

$datos_verificacion = $query->fetchAll();
$query->closeCursor(); 

//logica que verifica si los cupos de la recalda ya estan llenos
if($cuposUsados==$cupos_de_recalada) {
    $desabilitarButton = true;
    $textoBotonInscribirse = "Cupos llenos";
} 
foreach($datos_verificacion as $dv) {
    $turnoDeLaRecalada = $dv["turno"];
    switch ($dv) {
        case $dv['e_i'] === 'Cancelado':
            $textoBotonInscribirse = 'Inscripcion Cancelada';
            $mostrarSombra = true;
            $desabilitarButton = true;
            break;
        case $dv['e_i']==='En revision':
            $textoBotonInscribirse = 'Inscrito';
            $mostrarSombra = true;
            $desabilitarButton = true;
            break;
        case $dv['e_i']==='Asistio' && $dv['e_t']==='Trabajo':
            if($cuposUsados==$cupos_de_recalada) {
                $desabilitarButton = true;
                $textoBotonInscribirse = "Cupos llenos";
            }  else {
                $textoBotonInscribirse = 'Volver a inscribirme!';
                $desabilitarButton = false;
                $mostrarSombra= false;
            }
            break;    
    }
}
?>