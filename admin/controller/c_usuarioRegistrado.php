<?php
include "../model/conexion_bd.php";
$sql = "SELECT cedula, rnt, userId, loginId, er_nombre, er_apellido, sec_nombre, 
        sec_apellido, imagen_guia, rol, usuario.estado FROM cedula_rnt 
        INNER JOIN usuario ON cedula_rnt.id = usuario.cedula_rnt_id";
$query = $conexion->prepare($sql);
$query->execute();
$resultados = $query->fetchAll();
$query->closeCursor();

$userID=(isset($_POST['usId']))?$_POST['usId']:"";
$email=(isset($_POST['email']))?$_POST['email']:"";
$primer_n =(isset($_POST['er_nombre']))?$_POST['er_nombre']:"";
$segundo_n =(isset($_POST['sec_nombre']))?$_POST['sec_nombre']:"";
$primer_a =(isset($_POST['er_apellido']))?$_POST['er_apellido']:"";
$segundo_a =(isset($_POST['sec_apellido']))?$_POST['sec_apellido']:"";
$rol =(isset($_POST['rol']))?$_POST['rol']:"";
$estado =(isset($_POST['estado']))?$_POST['estado']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
switch($accion) {
        case "delete":
                //debemos buscar la imagen para poder borrarla y no dejar rastro de ella
                $query = $conexion->prepare("SELECT imagen_guia as i FROM usuario WHERE userId = :usId");
                $query->bindParam(':usId',$userID);
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
                $sql = "DELETE FROM usuario WHERE userId = :usID";
                $consulta = $conexion->prepare($sql);
                $consulta->bindParam("usID", $userID);
                if($consulta->execute()) {
                        $consulta->closeCursor();
                        ?>
                <script>
                  usuarioEliminadoConExito();
                </script>
<?php
                }
                break;
        case "modificarU":
                $sql = "UPDATE usuario SET loginId=:email, er_nombre=:er_n,
                sec_nombre=:seg_n, er_apellido=:er_a, sec_apellido=:seg_a,
                rol=:rol, estado=:estado WHERE userId=:us_id";
                $consulta = $conexion->prepare($sql);
                $consulta->bindParam(":email",$email);
                $consulta->bindParam(":er_n",$primer_n);
                $consulta->bindParam(":seg_n",$segundo_n);
                $consulta->bindParam(":er_a",$primer_a);
                $consulta->bindParam(":seg_a",$segundo_a);
                $consulta->bindParam(":rol",$rol);
                $consulta->bindParam(":estado",$estado);
                $consulta->bindParam(":us_id",$userID);
                if($consulta->execute()) {
                        $consulta->closeCursor();
                        ?>
<script>
usuarioModificadoConExito();
</script>
<?php
                }
                break;        
}





?>