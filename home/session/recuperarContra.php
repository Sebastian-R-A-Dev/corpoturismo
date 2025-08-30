<?php
//desabilidata por el momento
header('Location:../../index.php');
?>
<?php include "templates/cabecera.php";?>
<body class="body1">
<?php
include "../../model/conexion_bd.php";
include "controller/c_recuperarContra.php";
?>
    <div class="container"> 
        <div class="login-left">
            <?php 
            if($recuperarContraForm) {
            ?>
            <div class="header">
                <a href="login.php" class="icon"><i class="fa-sharp fa-solid fa-reply fa-2x"></i></a>
                <span class="title">VOLVER</span>
            </div>
            <div class="login-header">
                <h1>Recuperar contraseña</h1>
                <p>Por favor indique su email</p>
            </div>
            <form class="login-form" method="POST">
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="email">Introduzca su email</label>
                        <input type="email" class="form-control" name="email" required />
                    </div>
                    
                    <button type="submit" name="accion" value="enviar_contra_cambio" class="button1">Recuperar</button>
                </div>
            </form>
            <?php
            } else {
            ?>
            <div class="login-header">
                <h1>Recuperar contraseña</h1>
                <p>Ingrese su nueva contraseña.</p>
            </div>
            <form id="fomulario" class="login-form" method="POST">
                <div class="login-form-content">
                    <div class="form-item">
                        <label>Nueva contraseña</label>
                        <input type="password" class="form-control" id="contra" name="contra" required />
                    </div>

                    <div class="form-item">
                        <label>Confirme su contraseña</label>
                        <input type="password" class="form-control" id="c_contra" name="c_contra" required />
                    </div>

                    <input type="hidden" name="accion" value="definiendo_contra" readonly>
                    
                    <button type="button" onclick="verificarContras()" class="button1">Guardar</button>
                </div>
            </form>
            <?php
            }
            ?>
        </div>
        <div class="login-right">
            <img src="images/image.png" width="800">
        </div>
    </div>
<?php include "templates/pie.php";?>