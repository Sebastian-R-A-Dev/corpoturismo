//funciones usadas en recalada
function ConfirmarEliminar(nombre_recalada) {
    var respuesta = confirm(`Estas a punto de eliminar la recalada ${nombre_recalada}!`);
    if (respuesta == true) return true;
    else return false;
}

//funcion para eliminar usuario autorizados
function confirmarEliminarUATO(value1, value2) {
    var respuesta = confirm(`Seguro que desea eliminar la combinación ${value1} - ${value2}`);
    if(respuesta == true) return true;
    else return false;
}

//mensaje para cuando quieres eliminar un usuario autorizado
function eliminarUsuarioAto() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "warning",
        text: "No se puede eliminar esta combinación, porque, esta vinculada a un usuario!",
        confirmButtonText: "Ok!",
    })
}

//mensjae para cuando la combinacion de usuario autorizado fue elmimnada con exito
function usuarioAtdoEliminado() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "success",
        text: "Combinacion eliminada con exito!",
        confirmButtonText: "Ok!"
    }).then((result) => {
        location.href = "usuarioAtdo.php";
     })
}

function recaladaEliminadaMSJ(value) {
    Swal.fire({
        title: 'Corpoturismo',
        html: `<span>Exito eliminado la recalada</span><br/>
        <span style="color: #F65E5E">${value}</span>`,
        icon: 'success',
        allowOutsideClick: false,
        confirmButtonText: 'Ok!',
    })
}

function mostrarMSJ(value) {
    var msj_txt_1 = "Recalada";
    var msj_txt_2 = "modificada";
    Swal.fire({
        title: 'Corpoturismo',
        html: `<span>${msj_txt_1} <span style="color: #F65E5E"><b>"${value}"</b></span> ${msj_txt_2}</span>`,
        icon: 'success',
        allowOutsideClick: false,
        confirmButtonText: 'Ok!',
    })
}

function noEliminarRecaladaMSJ(name) {
    Swal.fire({
        title: 'Corpoturismo',
         html: `<span>Tiene usuarios vinculados a la recalda</span>
        <br/><span><b style="color: #F65E5E">${name}</b></span>`,
        icon: 'error',
        allowOutsideClick: false,
        confirmButtonText: 'Ok!',
    })
}

//funcones de msj para usuario atdo
function usuarioExistenteErrorMsj(num1,num2) {
    Swal.fire({
        title: 'Corpoturismo',
         html: `<span>Cedula 
         <span style="color: #F65E5E"><b>${num1}</b></span> 
         o Rnt <span style="color: #F65E5E"><b>${num2}</b></span>
         </span>
         <br><span>Estos numeros estan relacionados debe verificar que ninguno exista</span>`,
         icon: 'warning',
         confirmButtonText: 'Ok!',
    })
}

function mostrarMsjModificadoUsuarioAtdo(value) {
    var msj_txt_1 = "Usuario";
    var msj_txt_2 = "modificado";
    Swal.fire({
           title: 'Corpoturismo',
           html: `<span>${msj_txt_1} <span style="color: #F65E5E"><b>"${value}"</b></span> ${msj_txt_2}</span>`,
           icon: 'success',
           allowOutsideClick: false,
           confirmButtonText: 'Ok!',
         }).then((result) => {
            if(result.isConfirmed) location.href = "usuarioAtdo.php";
         })
 }
//funcion para redirecionar a la recalada y buscar sus guias
function cargarUsuariosRecalada(numero_recalada, nombre_recalada) {
    if(numero_recalada) 
        location.href=`guias_recalada.php?recalada=${numero_recalada}&nombre=${nombre_recalada}`;
}

//funcion para redirecionar en guias_recalada
function redirecionarNoRecaladaSelecionada() {
    location.href = "guia_recalada.php";
}

//funcion para confirmar si queremos eliminar un usuario
function confirmEliminarUsuario(name) {
    var respuesta = confirm(`Esta seguro que desea eliminar al usuario ${name}`);
    if(respuesta) return true;
    else return false;
}

//msj para cuando el usuario fue eliminado con exito
function usuarioEliminadoConExito() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "success",
        text: "Usuario eliminado con exito!",
        confirmButtonText: "Ok!"
    }).then((result) => {
        location.href = "usuarioRegistrado.php";
     })
}

//msj para cuando el usuario registrado fue modificado con exito
function usuarioModificadoConExito() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "success",
        text: "Usuario modificado con exito!",
        confirmButtonText: "Ok!"
    }).then((result) => {
        location.href = "usuarioRegistrado.php";
     })
}

//funcion para confirmar modificacion de usuarios con roles de usuario
//tener en cuenta esto ya que pueden haber usuario inscritos y un cambio de rol no seria muy bueno
function confirmModificarUsuario(name) {
    var respuesta = confirm(`Esta seguro que desea modificar al usuario ${name}`);
    if(respuesta) return true;
    else return false;
}

function confirmLimpiarInscripciones(name) {
    var respuesta = confirm(`Esta seguro que desea eliminar las inscripciones a ${name}?`);
    if(respuesta) return true;
    else return false;
}

function inscripcionesLimpiadas() {
    Swal.fire({
        title: "Corpoturismo",
        icon: "success",
        text: "Inscripciones eliminadas!",
        confirmButtonText: "Ok!"
    }).then((result) => {
        location.href = "guia_recalada.php";
     })
}