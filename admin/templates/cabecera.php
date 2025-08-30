<?php
session_start();
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$user_id = $_SESSION['userId'];
if(!$_SESSION['validador']) { header("Location:../index.php "); }
if(!$_SESSION['validLogin']) { header("Location:../home/session/login.php "); }
if($_SESSION['rol']==='USER') { header('Location:../users/index.php');}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo</title>
    <link rel="icon" type="image/x-icon" href="../images/dashboard.png">
    <link rel="stylesheet" href="admin.css">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <!-- codigo html del header viejo sera reincorporado -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Dashboard Administrativo</span>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link link-header" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header" href="recalada.php">Recalada</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link-header dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="usuarioAtdo.php">Usuarios Autorizados</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="usuarioRegistrado.php">Usuarios Registrados</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link-header dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Inscripciones</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="guias.php">Listado de Inscripciones</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="guia_recalada.php">Inscripciones por recalada</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-header" href="../turnos/index.php">Administración Turnos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link-header dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Mi Cuenta</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="cuenta.php">
                                <i class="fa-solid fa-circle-user"></i>
                                Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../users/index.php">
                                <i class="fa-solid fa-eye"></i>
                                Ver sitio web
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="cerrarSesion.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Salir
                            </a>
                        </div>
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