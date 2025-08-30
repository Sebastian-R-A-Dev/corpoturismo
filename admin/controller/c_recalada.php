<!--script para mostrar un alert fueron movidos a un archivo aparte-->
<?php
include "../model/conexion_bd.php";
$id=(isset($_POST['id']))?$_POST['id']:"";
$name=(isset($_POST['name']))?$_POST['name']:"";
$imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
$f_inicio=(isset($_POST['f_i']))?$_POST['f_i']:"";
$f_final=(isset($_POST['f_f']))?$_POST['f_f']:"";
$cupo=(isset($_POST['c_p']))?$_POST['c_p']:"";
$tripulantes=(isset($_POST['t_p']))?$_POST['t_p']:"";
$pasajeros=(isset($_POST['p_j']))?$_POST['p_j']:"";
$estado=(isset($_POST['est']))?$_POST['est']:"";
$descrip=(isset($_POST['d_p']))?$_POST['d_p']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
//variables para enviar la fecha y hora automaticamente
date_default_timezone_set("America/Bogota");
$time = date ("Y-m-d");
//session value
$user_id = $_SESSION['userId'];

switch($accion) {
    case "add":
        //dato fecha importante para poder diferenciar imagenes; en caso de que un usuario suba imagenes con el mismo nombre
        $fecha = new DateTime();
        $nombre_file=($imagen!="") ? $fecha->getTimestamp()."_".$_FILES["imagen"]["name"] : "imagen.jpg";
        $tmpImagen=$_FILES["imagen"]["tmp_name"];
        if ($tmpImagen!="") {
             // Definimos la ruta final donde se guardará
            $rutaDestino = "images/" . $nombre_file;

            // Primero movemos el archivo temporal a la carpeta destino
            move_uploaded_file($tmpImagen, $rutaDestino);

            // Ahora redimensionamos la imagen (máx. 800x800)
            try {
                include "util/resizeImage.php";
                //code...
                resizeImage($rutaDestino,800, 800, $rutaDestino);
            } catch (\Throwable $th) {
                echo "". $th->getMessage();
                throw $th;
            }
        }
        $sql = "INSERT INTO `recaladas`(`nombre`, `imagen`, `f_registro`, `f_inicio`, `f_final`, `descripcion`, `cupo`, `tripulantes`, `pasajeros`, `user_id`, `estado`) 
        VALUES (:n, :i, :f_r, :f_i, :f_f, :d, :c, :t, :p, :u_i, :e)";
        $query = $conexion->prepare($sql);
        $query->bindParam(':n',$name);
        $query->bindParam(':i',$nombre_file);
        $query->bindParam(':f_r',$time);
        $query->bindParam(':f_i',$f_inicio);
        $query->bindParam(':f_f',$f_final);
        $query->bindParam(':d',$descrip);
        $query->bindParam(':c',$cupo);
        $query->bindParam(':t',$tripulantes);
        $query->bindParam(':p',$pasajeros);
        $query->bindParam(':u_i',$user_id);
        $query->bindParam(':e',$estado);
        if($query->execute()) {
            $query->closeCursor();
        ?>
            <!--si entra en el if ejecuta esto, uso js porque el header esta dando problemas-->
        <script>
        location.href = 'recalada.php';
        </script>
        <?php
        }
        break;
    case "update":
        $sql = "UPDATE recaladas SET nombre=:n, f_inicio=:f_i, f_final=:f_f, 
               descripcion=:d, cupo=:c, tripulantes=:t, pasajeros=:p, user_id=:u_i, estado=:e WHERE id=:id";
        $query = $conexion->prepare($sql);
        $query->bindParam(':n',$name);
        $query->bindParam(':f_i',$f_inicio);
        $query->bindParam(':f_f',$f_final); 
        $query->bindParam(':d',$descrip);
        $query->bindParam(':c',$cupo);
        $query->bindParam(':t',$tripulantes);
        $query->bindParam(':p',$pasajeros);
        $query->bindParam(':u_i',$user_id);
        $query->bindParam(':e',$estado);
        $query->bindParam(':id',$id);
        if($query->execute()) {
            $query->closeCursor();
        ?>
        <script>
           mostrarMSJ("<?php echo $name;?>");
        </script>
        <?php
        }
        break;
    case "updateImg":
        if($imagen!="") {
            $fecha = new DateTime();
            $nombre_file=($imagen!="") ? $fecha->getTimestamp()."_".$_FILES["imagen"]["name"] : "imagen.jpg";
            $tmpImagen=$_FILES["imagen"]["tmp_name"];
            move_uploaded_file($tmpImagen,"images/".$nombre_file);
            $query = $conexion->prepare("SELECT recaladas.imagen as i FROM recaladas WHERE id=:id");
            $query->bindParam(':id',$id);
            $query->execute();
            $result = $query->fetchall();
            foreach($result as $rst) {
                $img = $rst['i'];
            }
            $query->closeCursor();
            //logica para modificar las imagenes en la carpeta images
            if (isset($img) && ($img!="imagen.jpg")) {
                if(file_exists("images/".$img)){
                      unlink("images/".$img);
                }
            }
            $query2 = $conexion->prepare("UPDATE recaladas SET imagen=:i WHERE id=:id");
            $query2->bindParam(':i', $nombre_file);
            $query2->bindParam(':id', $id);
            $query2->execute();
            if($query2->execute()) {
                $query2->closeCursor();
            ?>
            <script>
               mostrarMSJ("<?php echo $name;?>");
            </script>
            <?php
            }
        }
        break;
    case "delete":
        $continuar = false;
        //:id_rd es id de la recalada
        $sql = "SELECT COUNT(*) AS 'datos' FROM r_inscripcion WHERE id_recalada = :id_rd";
        $query = $conexion->prepare($sql);
        $query->bindParam(':id_rd',$id);
        $query->execute();
        $result = $query->fetchall();
        $query->closeCursor();
        foreach($result as $rst) {
          $valor = $rst['datos'];
        }
        if($valor>0) {
         ?>
         <script>
            noEliminarRecaladaMSJ('<?php echo $name;?>');
         </script>
         <?php
        } else {
            $query = $conexion->prepare("SELECT recaladas.imagen as i FROM recaladas WHERE id=:id");
            $query->bindParam(':id',$id);
            $query->execute();
            $result = $query->fetchall();
            foreach($result as $rst) {
                $img = $rst['i'];
            }
            $query->closeCursor();
            //logica para modificar las imagenes en la carpeta images
            if (isset($img) && ($img!="imagen.jpg")) {
                if(file_exists("images/".$img)){
                      unlink("images/".$img);
                }
            }
            $query = $conexion->prepare("DELETE FROM recaladas where id=:r_id");
            $query->bindParam(':r_id', $id);
            if($query->execute()) {
               ?>
               <script>
                recaladaEliminadaMSJ('<?php echo $name;?>');
               </script>
               <?php
            }  
        }
        //primero se verifica que cantidad de usuarios estan inscritos a esta recalada que se esta intentando eliminar, si este tiene usuarios vinculados no puede eliminarla, no debe tener niguna vinculacion para poder eliminar
        break;          
}
$n_table = "recaladas";
$sql = "SELECT $n_table.id, $n_table.nombre as r_n, $n_table.imagen as i, $n_table.f_inicio as f_i, $n_table.f_final as f_f, $n_table.descripcion as descri, $n_table.cupo as c_p, usuario.er_nombre as u_name, $n_table.estado as est, $n_table.tripulantes as trip, $n_table.pasajeros as psj
FROM `recaladas` INNER JOIN usuario ON $n_table.user_id = usuario.userId";
$query = $conexion->prepare($sql);
$query->execute();
$lista_recalada = $query->fetchall();
$query->closeCursor();
?>


