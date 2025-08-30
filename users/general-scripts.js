function inscripcionExitosaMSJ(name_recalda) {
    Swal.fire({
        title: 'Corpoturismo',
         html: `<span><b style="color: #F65E5E">${name_recalda}</b></span>
        <br/><span>Se ha inscrito a esta recalada.</span>`,
        icon: 'success',
        confirmButtonText: 'Super!',
    })
}

function openDetailsRecalada(condicion, recalada, turno, fecha_i, fecha_f) {
    if(condicion === "Inscripcion Cancelada") {
        Swal.fire({
            title: 'Corpoturismo',
             html: `<h3>${recalada}</h3>
             <b style="color: #F65E5E; font-size:15px;">La inscrpcion fue cancelada, 
             comuniquese con administración si cree que fue un error.</b>`,
            icon: 'warning',
            showConfirmButton: false,
        })
    } else if (condicion === "Inscrito") {
        Swal.fire({
            title: 'Corpoturismo',
             html: `<label><b>Recalada:</b></label><span> <b style="color: #F65E5E">${recalada}</b></span>
             <br><label><b>Inicia:</b></label><span> <b style="color: #F65E5E">${fecha_i}</b></span>
             <br><label><b>Finaliza:</b></label><span> <b style="color: #F65E5E">${fecha_f}</b></span>
            <br/><span>Su turno es</span><br>
            <span><b style="color: #F65E5E; font-size:50px;">${turno}</b></span>`,
            icon: 'info',
            showConfirmButton: false,
        })
    }
}

function errorUsuarioEliminado() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "error",
        text: "Error en las credenciales de este usuario, porfavor inicie sessión otra vez.",
        allowOutsideClick: false,
    }).then((result) => {
        if(result.isConfirmed) location.href = "cerrarSesion.php";
     })
}

//funcion msj para cuando modificas tu informacion de perfil
function infoModificadaConExito() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "success",
        text: "Informacion de la cuenta fue modificada con exito.",
        confirmButtonText: 'Ok!',
    }).then((result) => {
        location.href = "cuenta.php";
     })
}