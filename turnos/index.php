<?php include "templates/cabecera.php" ?>
<div class="top-card">
    <div class="col-md-12 sub-box-top-card">
        <div class="p-5 bg-light">
            <div class="container">
                <h1 class="display-3">Bienvenido <?php echo $nombre." ".$apellido;?></h1>
                <p class="lead">Estas en la parte administrativa de los turnos.</p>
                <hr class="my-2">
                <p>Podras ver las recaladas con sus usuarios, ademas de cada turno y configuracion permitida!!</p>
                <a class="btn btn-success" href="recalada.php" role="button">Ver Recaladas!</a>
            </div>
        </div>
    </div>
</div>
<?php include "templates/pie.php" ?>