<?php include "templates/cabecera.php";
      include "controller/c_turno_recalada.php"; 
      if($listaDatos) {
?>
<div class="caja-general">
    <div class="sub-caja-general">
        <div class="caja-titulos-t-r">
            <h3 class="titulo-t-r"><?php echo $nombreRecalada;?></h3>
        </div>
        <div class="table-responsive">
            <table class="table table-secondary table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Turno</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Estado laboral</th>
                        <th scope="col">Observación</th>
                        <th scope="col">
                            <i class="fa-solid fa-gear"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($listaDatos as $dataUsuario) { 
                  switch ($dataUsuario['estado_ins']) {
                        case "En revision":
                              $icon = '<i class="fa-solid fa-pen-to-square"></i>';
                              $color="#0d6efd";
                              break;
                        case "Asistio":
                              $icon = '<i class="fa-regular fa-face-smile-beam"></i>';
                              $color="#198754";
                              break;
                        case "No Asistio":
                              $icon = '<i class="fa-solid fa-face-meh"></i>';
                              $color="#ffc107";
                              break;
                        case "Cancelado":
                              $icon = '<i class="fa-solid fa-face-frown-open"></i>';
                              $color="#dc3545";
                              break;                  
                  }
                  ?>
                    <tr>
                        <td>
                            <?php echo $dataUsuario['er_nombre'];?>
                            <?php echo $dataUsuario['sec_nombre'];?>
                        </td>
                        <td>
                            <?php echo $dataUsuario['er_apellido'];?>
                            <?php echo $dataUsuario['sec_apellido'];?>
                        </td>
                        <td>
                            <?php echo $dataUsuario['turno'];?>
                        </td>
                        <td>
                            <div style="background-color: <?php echo $color;?>" class="box-status-icon-t-r">
                                <span><?php echo $dataUsuario['estado_ins'];?></span>
                                <span><?php echo $icon;?></span>
                            </div>
                        </td>
                        <td>
                            <?php echo $dataUsuario['estado_trabajo'];?>
                        </td>
                        <td class="width-35-porcent" >
                        <?php echo $dataUsuario['observacion'];?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#selecionar<?php echo $dataUsuario['id'];?>">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </button>
                            <?php include("u_turno_modal.php") ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
      } 
      include "templates/pie.php" 
?>