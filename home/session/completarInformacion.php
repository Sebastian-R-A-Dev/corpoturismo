<?php
//desabilidata por el momento
header('Location:../../index.php');
?>
<?php include "templates/cabeceraCompletarInformacion.php"; ?>

<body class="body1">
    <?php
    include "../../model/conexion_bd.php";
    include "controller/c_completarInformacion.php";
    ?>
    <div class="container">
        <div class="login-left">
            <div class="data-header">
                <h1>Datos necesarios para poder ingresar</h1>
                <p>Estos datos seran solicitados solo una vez para los usuarios nuevos.</p>
            </div>

            <form class="login-form" method="POST">
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="text">Primer nombre</label>
                        <input type="text" class="form-control" name="er_name" required />
                    </div>
                    <div class="form-item">
                        <label for="text">Segundo nombre</label>
                        <input type="text" class="form-control" name="sec_name" />
                    </div>
                    <div class="form-item">
                        <label for="text">Primer apellido</label>
                        <input type="text" class="form-control" name="er_ape" required />
                    </div>
                    <div class="form-item">
                        <label for="text">Segundo apellido</label>
                        <input type="text" class="form-control" name="sec_ape" required />
                    </div>
                    <button type="submit" class="button1">Guardar datos</button>
                </div>
            </form>
        </div>
        <div class="login-right">
            <img src="images/image.png" width="800">
        </div>
    </div>
    <?php include "templates/pie.php"; ?>