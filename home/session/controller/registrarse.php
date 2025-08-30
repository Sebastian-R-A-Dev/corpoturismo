<?php
include "library/script.php";

if($_POST) {
   $rnt=(isset($_POST['rnt']))?$_POST['rnt']:"";
   $cedula=(isset($_POST['ced']))?$_POST['ced']:"";
   $email=(isset($_POST['email']))?$_POST['email']:"";
   $contra=(isset($_POST['contra']))?$_POST['contra']:"";

   $sql = "SELECT COUNT(*) as count FROM usuario WHERE loginId = :email";

   $consulta = $conexion->prepare($sql);
   $consulta->bindParam(":email", $email);
   $consulta->execute();

   $resultado = $consulta->fetch();
   $consulta->closeCursor();
   //si el ressultado es 1 e porque el correo existe
   if($resultado['count'] == '1') {
      ?>
         <script>registrarseMostrarErrorMsj("El correo ya se encuentra en uso. ");</script>
      <?php
   } else {
      $sql = "SELECT id FROM cedula_rnt WHERE cedula = :cedula AND rnt = :rnt";
      $consulta = $conexion->prepare($sql);
      $consulta->bindParam(":cedula", $cedula);
      $consulta->bindParam(":rnt", $rnt);
      $consulta->execute();
      $resultado = $consulta->fetch();
      $consulta->closeCursor();

      if(!$resultado) {
         ?>
          <script>registrarseMostrarErrorMsj("Cedula o rnt no son correctos.");</script>
         <?php
      } else {
         $id_cedula_rnt = $resultado['id'];
         $sql = "SELECT COUNT(*) as count FROM usuario WHERE cedula_rnt_id = :id";
         $consulta = $conexion->prepare($sql);
         $consulta->bindParam(":id", $id_cedula_rnt);
         $consulta->execute();
         $resultado = $consulta->fetch();
         $consulta->closeCursor();

         if ($resultado['count'] == '1') {
            ?>
               <script>registrarseMostrarErrorMsj("La cedula o el Rnt que ingreso estan relacionadas a otro usuario.");</script>
            <?php
         } else {
            include "functions/encriptar.php";
            include "functions/tokenConfig.php";

            $clave = "c2ViYXN0aWFu";
            $contra = encrypt($contra,$clave);

            date_default_timezone_set("America/Bogota");
            $time = date("Y-m-d");

            //construccion de token
            $token = tokenBuild($email, NUEVO_USUARIO, $contra, $time);
            $token = encrypt($token,$clave);

            $sql = "INSERT INTO usuario (loginId, contrasena, cedula_rnt_id, token, f_creacion)
                  VALUES (:correo, :contra, :id, :token, :f_creacion)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(":correo", $email);
            $consulta->bindParam(":contra", $contra);
            $consulta->bindParam(":id", $id_cedula_rnt);
            $consulta->bindParam(":token", $token);
            $consulta->bindParam(":f_creacion", $time);      
            
            if ($consulta->execute()) {
               $consulta->closeCursor();
               //construcion de datos para el envio de correo.
               $body = str_replace(TOKEN_COMODIN, $token, REGISTRO_BODY);
               sendEmail($email, REGISTRO_SUBJECT, $body);
               ?>
                  <script>registrarseRegistroExitoso()</script>
               <?php
            }
         }
      }
   }
}
?>