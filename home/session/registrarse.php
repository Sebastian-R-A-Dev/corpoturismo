<?php
//desabilidata por el momento
header('Location:../../index.php');
?>
<?php include "templates/cabecera.php"; ?>

<body class="body2">
    <?php

    include "../../model/conexion_bd.php";
    include "controller/registrarse.php";
    ?>
    <div class="container">
        <div class="login-left">
            <div class="header">
                <a href="../principal.php" class="icon"><i class="fa-solid fa-reply fa-2x"></i></a>
                <span class="title">INICIO</span>
            </div>
            <div class="login-header">
                <h1>Bienvenidos a nuestra aplicacion</h1>
                <p>Por favor registrese usando nuestra plataforma</p>
            </div>

            <form id="fomulario" class="login-form" method="POST">
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="email">Introduzca un email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-item">
                        <label for="password">Introduzca una contraseña</label>
                        <input type="password" id="contra" class="form-control" name="contra" required>
                    </div>
                    <div class="form-item">
                        <label for="password">Confirme la contraseña</label>
                        <input type="password" id="c_contra" class="form-control" name="confirm">
                    </div>
                    <div class="form-item">
                        <label for="password">Introduzca una cedula</label>
                        <input type="number" class="form-control" name="ced" required>
                    </div>
                    <div class="form-item">
                        <label for="password">Introduzca un rnt</label>
                        <input type="number" class="form-control" name="rnt" required>
                    </div>
                    <button type="button" onclick="verificarContras()" class="button2">Registrarse</button>
                </div>
            </form>
        </div>
        <div class="login-right">
            <img src="images/image.png" width="800">
        </div>
    </div>
    <?php include "templates/pie.php"; ?>