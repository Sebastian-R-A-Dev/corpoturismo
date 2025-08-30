<?php
session_start();
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$user_id = $_SESSION['userId'];
$userRol = $_SESSION['rol'];
if(!$_SESSION['validador']) { header("Location:../index.php "); }
if(!$_SESSION['validLogin']) { header("Location:../home/session/login.php "); }
if($_SESSION['rol']==='USER') { header('Location:../users/index.php');} 
?>
<!doctype html>
<html lang="es">

<head>
    <title>Dashboard Turnos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="turnos.css">
    <link rel="icon" type="image/x-icon" href="../images/turno.png">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/b4d98a8eb7.js" crossorigin="anonymous"></script>
    <script src="general-scripts.js"></script>
</head>

<body>
    <script>
    const name = "<?php echo $_SESSION['nombre'];?>".toUpperCase().split('')[0];
    const ape = "<?php echo $_SESSION['apellido'];?>".toUpperCase().split('')[0];
    <?php
    $letra1 = "<script>document.writeln(name);
    </script>";
    $letra2 = "<script>
    document.writeln(ape);
    </script>";
    ?>
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Dashboard Turnos</span>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link link-header" href="index.php"> Inicio </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header" href="recalada.php">Recaladas</a>
                    </li>
                    <?php
                    if($userRol==='ADMIN' || $userRol==='SUPER_USUARIO') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link link-header" href="../admin/index.php">Dasboard Administrativo</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link link-header" href="cerrarSesion.php">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Salir
                        </a>
                    </li>
                </ul>
            </div>
            <div class="caja-usuario">
                <span class="usuario-datos"><?php echo $nombre?></span>&nbsp;
                <span class="usuario-datos"><?php echo $apellido?></span>
                <div class="caja-morada">
                    <span><?php echo $letra1?></span>
                    <span><?php echo $letra2?></span>
                </div>
            </div>
        </div>
    </nav>