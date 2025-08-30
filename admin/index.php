<?php include "templates/cabecera.php" ?>
<div class="top-card">
    <div class="col-md-12 sub-box-top-card">
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3">Bienvenido, <?php echo $nombre." ".$apellido;?></h1>
                <p class="lead">Este es el dashboard administrativo, podra ver todas las funcionalidades disponibles.</p>
                <hr class="my-2">
                <p>Comencemos explorando las recaladas!!</p>
                <a class="btn btn-dark" href="recalada.php" role="button">Recaladas!</a>
            </div>
        </div>
    </div>
</div>
<?php include "templates/pie.php" ?>