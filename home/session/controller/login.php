<?php
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch ($accion) {
  case 'iniciar':
    $email=(isset($_POST['email']))?$_POST['email']:"";
    $contra=(isset($_POST['contra']))?$_POST['contra']:"";

    include "functions/encriptar.php";
    $clave = "c2ViYXN0aWFu";
    $contra = encrypt($contra,$clave);

    $sql = "SELECT * FROM usuario WHERE loginId = :email AND contrasena = :contra";

    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(":email", $email);
    $consulta->bindParam(":contra", $contra);
    $consulta->execute();
    $resultado = $consulta->fetchall();
    $consulta->closeCursor();

    if(!$resultado) {
      ?>
        <script>
          loginErroneo();
        </script>
      <?php
    } else {
      foreach($resultado as $rst) {
        $userRol = $rst['rol'];
        $userId = $rst['userId'];
        $loginId = $rst['loginId'];
        $primer_nombre = $rst['er_nombre'];
        $primer_ape = $rst['er_apellido'];
        $usuarioValido = $rst['usuarioVerficado'] === 'SI' ? true : false;
        $usuarioActivo = $rst['estado'] === 'Activo' ? true : false;
      }

      if (!$usuarioActivo) {
        ?>
          <script>
            loginNoPermitido();
          </script>
        <?php
      }

      if (!$usuarioValido) {
        ?>
          <script>
            usuarioNoVerificado();
          </script>
        <?php
      }
      
      if ($usuarioActivo && $usuarioValido) {
        $_SESSION['email'] = $loginId;
        $_SESSION['rol'] = $userRol;
        $_SESSION['userId'] = $userId;
        $_SESSION['nombre'] = $primer_nombre;
        $_SESSION['apellido'] = $primer_ape;
        $_SESSION['validLogin'] = true;

        switch ($userRol) {
          case 'ADMIN':
            header("Location: ../../admin/index.php");
            break;
          case 'SUPER_USUARIO':
            header("Location: ../../admin/index.php");
            break;
          case 'USER':
            header("Location: ../../users/index.php");
            break;  
        }
      }
    } 
    break;
}
?>