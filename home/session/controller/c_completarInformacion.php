<?php
$token = $_GET['token'] ?? null;

if ($token == null) {
  header("Location: login.php");
} else {
  include "functions/desencriptar.php";
  include "library/script.php";
  $clave = "c2ViYXN0aWFu";
  //verificamos si la url tiene espacio, debido a que pueden llegar el valor + en el token el cual el navegador lo cambia como un espacio en blanco, 
  //nosotros debemos regresar el valor original.
  $token = str_replace(' ','+', $token);

  $datos = decrypt($token, $clave);
  $arrayDatos = explode(";", $datos);

  if ($arrayDatos[1] == NUEVO_USUARIO) {
    //en el array de los tos el primer valor corresponde al correo del usuario.
    $correo = $arrayDatos[0];
    $sql = "SELECT * FROM usuario WHERE loginid = :correo AND token = :token";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(":correo", $correo);
    $consulta->bindParam(":token", $token);
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    $consulta->closeCursor();

    if($resultado == null) {
      ?>
       <script>linkInvalido();</script>
      <?php
    } else {
      if($_POST) {
        $er_nombre=(isset($_POST['er_name']))?$_POST['er_name']:"";
        $sec_nombre=(isset($_POST['sec_name']))?$_POST['sec_name']:"";
        $er_ape=(isset($_POST['er_ape']))?$_POST['er_ape']:"";
        $sec_ape=(isset($_POST['sec_ape']))?$_POST['sec_ape']:"";
        $imagen_nuevo_usuario_por_defecto = 'imagen_por_defecto_usuario.png';

        $sql = "UPDATE usuario SET er_nombre = :er_n, sec_nombre = :sec_n, 
        er_apellido = :er_a, sec_apellido = :sec_a, imagen_guia = :i_g, usuarioVerficado = 'SI' WHERE loginId = :lo_id";

        $query = $conexion->prepare($sql);
        $query->bindParam(':er_n', $er_nombre);
        $query->bindParam(':sec_n', $sec_nombre);
        $query->bindParam(':er_a', $er_ape);
        $query->bindParam(':sec_a', $sec_ape);
        $query->bindParam(':i_g', $imagen_nuevo_usuario_por_defecto);
        $query->bindParam(':lo_id', $correo);

        if($query->execute()) {
          ?>
           <script>completarInformacionValido()</script>
          <?php
        }
    }
    }

  }
}
?>