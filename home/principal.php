<?php include "templates/cabecera.php"; ?>
<script>
    function opcionDesactivada() {
        Swal.fire({
            title: 'Corpoturismo',
            text: 'Por ahora la opción de registrarse no está disponible.',
            icon: 'warning',
            confirmButtonText: 'Ok',
        })
    }
</script>
<div class="boxWhite">
    <div class="row">
        <div class="p-5 bg-light borde">
            <div>
                <h1 class="title">DASHBOARD EVENTS.</h1>
                <p class="lead details">Trabando para el futuro de los guias turisticos!!</p>
                <hr class="my-2">
                <p class="details">Por favor iniciar sesion o registrarse</p>
                <div class="boxButtons">
                    <a class="btn btn-primary btn-lg" href="session/login.php" role="button">Iniciar Sesión</a>&nbsp;
                    <button type="button" class="btn btn-dark btn-lg" onclick="opcionDesactivada()">Registrarse</button>
                    <!--                    <a class="btn btn-dark btn-lg" href="session/registrarse.php" role="button">Registrarse</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "templates/pie.php"; ?>