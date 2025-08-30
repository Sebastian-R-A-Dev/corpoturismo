<?php
include "../model/conexion_bd.php";
$sql = "SELECT userId, loginId as email, cedula, rnt, er_nombre, sec_nombre, er_apellido, 
       sec_apellido, imagen_guia as img FROM usuario INNER JOIN cedula_rnt 
       ON cedula_rnt.id = usuario.cedula_rnt_id WHERE userId = :userId";
$consulta = $conexion->prepare($sql);
$consulta->bindParam("userId", $user_id);
$consulta->execute();
$cuentaInfo = $consulta->fetchAll();
$consulta->closeCursor();

$imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$er_nombre=(isset($_POST['er_nombre']))?$_POST['er_nombre']:"";
$sec_nombre=(isset($_POST['sec_nombre']))?$_POST['sec_nombre']:"";
$er_ape=(isset($_POST['er_ape']))?$_POST['er_ape']:"";
$sec_ape=(isset($_POST['sec_ape']))?$_POST['sec_ape']:"";
$email=(isset($_POST['email']))?$_POST['email']:"";
switch($accion) {
       case "modificarPerfil":
            $fecha = new DateTime();
            $nombre_file=($imagen!="") ? $fecha->getTimestamp()."_".$_FILES["imagen"]["name"] : "imagen.jpg";
            $tmpImagen=$_FILES["imagen"]["tmp_name"];
            move_uploaded_file($tmpImagen,"../home/session/images/users_img/".$nombre_file);
            $query = $conexion->prepare("SELECT imagen_guia as i FROM usuario WHERE userId = :usId");
            $query->bindParam(':usId',$user_id);
            $query->execute();
            $result = $query->fetchall();
            foreach($result as $rst) {
                $img = $rst['i'];
            }
            $query->closeCursor();
            //logica para modificar las imagenes en la carpeta images
            if (isset($img) && ($img!="imagen.jpg")) {
              if(file_exists("../home/session/images/".$img)){
                     if($img!="imagen_por_defecto_usuario.png") {
                            unlink("../home/session/images/".$img);
                     }
              }
            }
            $query2 = $conexion->prepare("UPDATE usuario SET imagen_guia = :i WHERE userId = :id");
            $query2->bindParam(':i', $nombre_file);
            $query2->bindParam(':id', $user_id);
            if($query2->execute()) {
              $query2->closeCursor();
              ?>
              <script>
              location.href = "cuenta.php";
              </script>
              <?php
            }
             break;
       case "modificarInfo":
              $sql = "UPDATE usuario SET loginId = :email, er_nombre = :er_n, 
              sec_nombre = :sec_n, er_apellido = :er_a, sec_apellido = :sec_a
              WHERE userId = :usId";
              $consulta = $conexion->prepare($sql);
              $consulta->bindParam(":email", $email);
              $consulta->bindParam(":er_n", $er_nombre);
              $consulta->bindParam(":sec_n", $sec_nombre);
              $consulta->bindParam(":er_a", $er_ape);
              $consulta->bindParam(":sec_a", $sec_ape);
              $consulta->bindParam(":usId", $user_id);
              if($consulta->execute()) {
                     $_SESSION['nombre'] = $er_nombre;
                     $_SESSION['apellido'] = $er_ape;
                     $_SESSION['loginId'] = $email;
                     $consulta->closeCursor();
                     ?>
              <script>
                infoModificadaConExito();
              </script>
                <?php
              }
              break;
}
?>