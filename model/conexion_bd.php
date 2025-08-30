<?php
//datos para base de dato local
// __DIR__ es /opt/lampp/htdocs/proyectov2
// subo dos niveles hasta llegar a /opt/lampp
$config = include(__DIR__ . '/../../../config.php');
$host = $config['host'];
$bd = $config['bd'];
$user = $config['user'];
$pass = $config['pass'];

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $user, $pass);

} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>