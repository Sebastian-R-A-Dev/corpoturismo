<?php
include "../model/conexion_bd.php";
//Esta variable es para validar si los datos (cedula y rnt) del usuario ya existen
$existeCR = false;

$id=(isset($_POST['id']))?$_POST['id']:"";
$cedula=(isset($_POST['cedula']))?$_POST['cedula']:"";
$rnt=(isset($_POST['rnt']))?$_POST['rnt']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$query = $conexion->prepare("SELECT * FROM cedula_rnt");
$query->execute();
$resultados = $query->fetchAll();
$query->closeCursor();

foreach ($resultados as $rst) {
    if ($rst['cedula']==$cedula || $rst['rnt']==$rnt) {
        $existeCR = true;
    }
}

if ($existeCR) {
    ?>
    <script>
        usuarioExistenteErrorMsj('<?php echo $cedula ?>','<?php echo $rnt?>');
    </script>
    <?php 
}
switch ($accion) {
    case 'add':
        if (!$existeCR) {
            $sql= "INSERT INTO `cedula_rnt`(`cedula`, `rnt`) VALUES (:cedula, :rnt)";
            $query = $conexion->prepare($sql);
            $query->bindParam(':cedula',$cedula);
            $query->bindParam(':rnt',$rnt);
            if($query->execute()) {
                $query->closeCursor();
                ?>
                <script>
                location.href = 'usuarioAtdo.php';
                </script>
                <?php
            }    
        }
        break;
    case 'update':
        if(!$existeCR) {
            $sql = "UPDATE cedula_rnt SET cedula=:cedula, rnt=:rnt WHERE id=:id";
            $query = $conexion->prepare($sql);
            $query->bindParam(':cedula',$cedula);
            $query->bindParam(':rnt',$rnt);
            $query->bindParam(':id',$id);
            if($query->execute()){
              $query->closeCursor();
            ?>
              <script>
              mostrarMsjModificadoUsuarioAtdo("<?php echo $id;?>");
              </script>
            <?php
            } 
        } 
        break;
    case 'delete':
        $idEsUsado = false;
        $query = "SELECT cedula_rnt_id as id FROM usuario WHERE cedula_rnt_id = :crid";
        $consulta = $conexion->prepare($query);
        $consulta->bindParam(":crid", $id);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        foreach($resultado as $rsta) {
            if($rsta['id']) {
                $idEsUsado = true;
            }
        }
        if($idEsUsado) {
            ?>
            <script>
                eliminarUsuarioAto();
            </script>
            <?php
        } else {
            $query2 = "DELETE FROM cedula_rnt WHERE id = :id";
            $consulta2 = $conexion->prepare($query2);
            $consulta2->bindParam(":id", $id);
            if($consulta2->execute()) {
                $consulta->closeCursor();
                $consulta2->closeCursor();
                ?>
                <script>
                    usuarioAtdoEliminado();
                </script>
                <?php
            }
        }
        break;     
}

?>

