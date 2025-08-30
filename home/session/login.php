<?php include "templates/cabecera.php"; ?>

<body class="body1">
    <?php
    include "../../model/conexion_bd.php";
    include "controller/login.php";
    ?>
    <script>
        function opcionDesactivada() {
            Swal.fire({
                title: 'Corpoturismo',
                text: 'Por ahora la opción de recuperar contraseña no está disponible.',
                icon: 'warning',
                confirmButtonText: 'Ok',
            })
        }
    </script>
    <div class="container">
        <div class="login-left">
            <div class="header">
                <a href="../principal.php" class="icon"><i class="fa-sharp fa-solid fa-reply fa-2x"></i></a>
                <span class="title">INICIO</span>
            </div>
            <div class="login-header">
                <h1>Bienvenidos a nuestra aplicacion</h1>
                <p>Por favor inicie sesion usando nuestra plataforma</p>
            </div>

            <form class="login-form" method="POST">
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="email">Introduzca su email</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    <div class="form-item">
                        <label for="password">Introduzca su contraseña</label>
                        <input type="password" class="form-control" name="contra" required>
                    </div>
                    <!--<a href="recuperarContra.php?razon=CAMBIO_CONTRA" class="no-contra">¿olvidaste tu contraseña?</a>-->
                    <button type="button" onclick="opcionDesactivada()" class="no-contra">¿olvidaste tu
                        contraseña?</button>
                    <button type="submit" name="accion" value="iniciar" class="button1">Iniciar Sesion</button>
                </div>
            </form>
        </div>
        <div class="login-right">
            <img src="images/image.png" width="800">
        </div>
    </div>


    <?php include "templates/pie.php"; ?>