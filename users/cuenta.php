<?php 
include "templates/cabecera.php";
include "controller/c_cuenta.php";
?>
<div class="caja-general-cuenta">
    <div class="sub-caja-general-cuenta">
        <div class="card">
            <div class="card-header caja-header-cuenta">
                <span>Mi cuenta</span>
            </div>
            <?php foreach($cuentaInfo as $cI) {?>
            <div class="caja-imagen-cuenta">
                <div class="sub-caja-imagen-cuenta">
                    <img src="../home/session/images/users_img/<?php echo $cI['img']?>" class="rounded">
                </div>
            </div>
            <div class="card-body">
                <hr>
                <div class="caja-nombres-cuenta">
                    <h4 class="card-title"><?php echo $cI['er_nombre']?> <?php echo $cI['sec_nombre']?></h4>
                    <h6 class="card-title"><?php echo $cI['er_apellido']?> <?php echo $cI['sec_apellido']?></h6>
                    <hr>
                    <p class="card-text"><b>Email :</b> <?php echo $cI['email'];?></p>
                    <hr>
                    <p class="card-text"><b>Cedula :</b> <?php echo $cI['cedula'];?></p>
                    <hr>
                    <p class="card-text"><b>Rnt :</b> <?php echo $cI['rnt'];?></p>
                </div>
                <div class="caja-button-cuenta">
                    <hr>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#uMiInfo<?php echo $user_id;?>">
                        Mi información
                    </button>
                    <?php include "u_mi_informacion_modal.php";?>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php include "templates/pie.php";?>