<?php
session_start();
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$user_id = $_SESSION['userId'];
$userRol = $_SESSION['rol'];
if(!$_SESSION['validador']) { header("Location:../index.php "); }
if(!$_SESSION['validLogin']) { header("Location:../home/session/login.php "); }
?>
<!doctype html>
<html lang="es">

<head>
    <title>Dashboard Cliente</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../images/calendario.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="users.css">
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
    <?php include "controller/c_verificarUsuario.php";?>
    <script>
    let name = "<?php echo $_SESSION['nombre'];?>".toUpperCase().split('')[0];
    let ape = "<?php echo $_SESSION['apellido'];?>".toUpperCase().split('')[0];
    <?php
    $letra1 = "<script>document.writeln(name);
    </script>";
    $letra2 = "<script>
    document.writeln(ape);
    </script>";
    ?>
    </script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand">Dashboard Cliente</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Recalada</a>
                    </li>
                    <?php if($userRol==='ADMIN' || $userRol==='SUPER_USUARIO') { ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../admin/index.php">Dasboard Administrativo</a>
                    </li>
                    <?php } ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Usuario
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="cuenta.php">
                                    <i class="fa-solid fa-circle-user"></i>
                                    Mi Pefil
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="cerrarSesion.php">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    Salir
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="caja-usuario mostrarCajaUsuario">
            <span class="usuario-datos"><?php echo $nombre?></span>&nbsp;
            <span class="usuario-datos"><?php echo $apellido?></span>
            <div class="caja-morada">
                <span><?php echo $letra1?></span>
                <span><?php echo $letra2?></span>
            </div>
        </div>
    </nav>