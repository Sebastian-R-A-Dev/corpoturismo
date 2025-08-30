<?php
$user_id;
include "../model/conexion_bd.php";

date_default_timezone_set("America/Bogota");
$time = date ("Y-m-d");
$fechaSiguiente = date("Y-m-d", strtotime($time. ' +1 day'));

$sql = "SELECT id, estado, f_inicio, f_final, nombre, imagen as img, cupo, descripcion as des_r 
FROM recaladas WHERE estado = 'Activo' OR estado = 'Inactivo'";

$query = $conexion->prepare($sql);
$query->execute();
$recaladasLista = $query->fetchAll();
$query->closeCursor();

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$recalada_id=(isset($_POST['numero_rcd']))?$_POST['numero_rcd']:"";
$recalada_nombre=(isset($_POST['nombre_rcd']))?$_POST['nombre_rcd']:"";
$turnoDinamico = 0;
switch ($accion) {
        case 'inscribir':
                //hacer un turno dinamico dejando la responsabilidad a este controlador

                /*@TODO: necesitamos contar las recaladas filtradas por fecha ya que la forma actual no sirve ejm:
                 dia 1 - se genero del turno 1 al 10.
                 dia 2 - se debe resetear nuevamente de 1 en adelante.

                 se debe hacer de esta forma si no el segundo dia, el proximo turno sera 11 y creo que esto no es correcto.
                 seria bueno si simulamos un reseteo de turnos diarios.

                 No importa si hay registros con turnos iguales, porque cada inscripcion tiene su propia fecha.
                 por lo que puede pasar que el dia User1 tenga turno 1 y el segundo dia el User 1 tenga nuevamente turno 1.

                 Son dos dias diferentes con el mismo turno para ese usuario..

                 toda esta duda se debe a que una vez termine el dia1 que va a pasar en el dia 2??

                 seguiran saliendo turnos en la tabla de la vista verde cada vez mas y mas.....alli deberiamos mostrarlo filtrado por la fecha actual
                 tambien....

                 ↑↑↑ de alli la idea de resetear los turnos y filtrar los resultados por la fecha actual siempre.
                 No necesitamos borrar ningun dato por ahora

                 No se si el contador que aparece abajo de las cards tambien debe ser reseteado.... no estoy seguro
                 Las cards de la recalada dicen el numero de inscritos, sin embargo no se si eso se debe resetear
                 ej: Recalada 1 tiene 10 inscritos el dia 1
                 el dia 2, seguira con el 11??
                */

                //new posible sql SELECT * FROM r_inscripcion WHERE id_recalada = 76 AND fecha_i = '2024-08-14';
                $sql="SELECT COUNT(*) AS 't' FROM r_inscripcion 
                WHERE id_recalada = :id_r AND r_inscripcion.fecha_i = :fecha";
                $turnos = $conexion->prepare($sql);
                $turnos->bindParam(':id_r', $recalada_id);
                $turnos->bindParam(':fecha', $time);
                $turnos->execute();
               
                $resultado = $turnos->fetch();
                $turnoDinamico = $resultado['t'];

                $turnos->closeCursor();
                
                $turnoDinamico = $turnoDinamico + 1;
                
                $time_f = date ("Y-m-d"); 
                $time_h = date ("h:i:s");

                $sql = "INSERT INTO r_inscripcion (id_usuario, id_recalada, turno, 
                fecha_i, hora_i) VALUES (:id_u, :id_r, :t, :f_i, :h_i)";
                
                $query = $conexion->prepare($sql);
                $query->bindParam(':id_u', $user_id);
                $query->bindParam(':id_r', $recalada_id);
                $query->bindParam(':t', $turnoDinamico);
                $query->bindParam(':f_i', $time_f);
                $query->bindParam(':h_i', $time_h);
                
                if($query->execute()) {
                        $query->closeCursor();
                ?>
                        <script>
                          inscripcionExitosaMSJ('<?php echo $recalada_nombre?>');
                        </script>
                <?php

                }
                break;
}
?>