<?php
include 'library/script.php';

$razon = $_GET['razon'] ?? null;
$token = $_GET['token'] ?? null;

if($razon == null) {
    header('Location: login.php');
} else if ($razon == DEFINIENDO_CONTRA && $token == null) {
    header('Location: login.php');
} else {
    include "functions/tokenConfig.php";

    $recuperarContraForm = $razon == CAMBIO_CONTRA ? true : false;
    $cambiarContraForm = $razon == DEFINIENDO_CONTRA ? true : false;

    //cuando el token no sea null tenemos que validar la informacion que hay en el
    if($token != null) {
        include "functions/desencriptar.php";
        //verificamos si la url tiene espacio, debido a que pueden llegar el valor + en el token el cual el navegador lo cambia como un espacio en blanco, 
        //nosotros debemos regresar el valor original.
        $token = str_replace(' ','+', $token);
        $clave = "c2ViYXN0aWFu";
        $datos = decrypt($token, $clave);
        $arrayDatos = explode(";", $datos);

        if(!isset($arrayDatos[1])) {
            ?>
            <script>linkInvalido()</script>
          <?php
        } else {
            $sql = "SELECT * FROM usuario WHERE loginId = :correo AND token = :token";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(":correo", $arrayDatos[0]);
            $consulta->bindParam(":token", $token);
            $consulta->execute();
            $resultado = $consulta->fetch();
            $consulta->closeCursor();

            if($resultado == null) {
                ?>
                  <script>linkInvalido()</script>
                <?php
            } 
        }
    }




    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case 'enviar_contra_cambio':
            $correo=(isset($_POST['email']))?$_POST['email']:"";

            $sql = "SELECT * from usuario WHERE loginId = :correo";

            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(":correo", $correo);
            $consulta->execute();
            $resultado = $consulta->fetch();
    
            if($resultado == null) {
            ?>
              <script>usuarioCorreoNoEncontrado();</script>
            <?php
            } else {
                include "functions/encriptar.php";

                date_default_timezone_set("America/Bogota");
                $time = date("Y-m-d");
    
                $token = tokenBuild($correo, CAMBIO_CONTRA, $resultado['contrasena'], $time);

                $clave = "c2ViYXN0aWFu";
                $token = encrypt($token,$clave);

                $sql = "UPDATE usuario SET token = :token WHERE loginId = :correo";

                $operacion = $conexion->prepare($sql);
                $operacion->bindParam(":token", $token);
                $operacion->bindParam(":correo", $correo);

                if($operacion->execute()) {
                    $body = str_replace(TOKEN_COMODIN, $token, CAMBIO_DE_CONTRA_BODY);
                    sendEmail($correo, CAMBIO_DE_CONTRA_SUBJECT, $body);
                    ?>
                      <script>correoCambioContraEnviado()</script>
                    <?php
                }
            }  
            break;
        case 'definiendo_contra':
            include "functions/encriptar.php";

            $contra=(isset($_POST['contra']))?$_POST['contra']:"";

            $clave = "c2ViYXN0aWFu";
            $contra = encrypt($contra,$clave);

            $sql = "UPDATE usuario SET contrasena = :contra WHERE loginId = :correo AND token = :token";

            //la variable  $resultado['loginId'] tomo valor desde el inicio del codigo
            $operacion = $conexion->prepare($sql);
            $operacion->bindParam(":contra", $contra);
            $operacion->bindParam(":correo", $resultado['loginId']);
            $operacion->bindParam(":token", $token);

            if($operacion->execute()) {
                $operacion->closeCursor();
                ?>
                  <script>cambioContraExitoso()</script>
                <?php
            }
            break;
    }
}    

?>