function mostrarMsjContra(contra) {
    Swal.fire({
        title: 'Corpoturismo',
        html: `su contraseña es <b style="color: #F65E5E">"${contra}"</b>`,
        icon: 'success',
        allowOutsideClick: false,
        confirmButtonText: 'Ok!',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "contra.php";
        }
    })
}

function mostrarMsjEmailNOExiste(email) {
    Swal.fire({
        title: 'Corpoturismo',
        html: `Correo <span style="color: red"> ${email}</span> no existe!!`,
        icon: 'info',
        confirmButtonText: 'Ok!',
    })
}

function complemetarRegistroUsuarioNuevo() {
    Swal.fire({
        title: 'Corpoturismo',
        text: 'Antes de continuar necesitamos llenar otros datos!',
        icon: 'info',
        allowOutsideClick: false,
        confirmButtonText: 'Continuar',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "data.php";
        }
    })
}

function msjUsuarioInactivo() {
    Swal.fire({
        title: 'Corpoturismo',
        text: 'Usuario temporalmente inactivo, si cree que es un error comuniquese con administración!',
        icon: 'warning',
        confirmButtonText: 'Ok',
    })
}

function registrarseMostrarErrorMsj(msj) {
    var msj_details = "si cree que este no es un error porfavor comunicarse con administración";
      Swal.fire({
             title: 'Corpoturismo',
             html: `<b style="color: #F65E5E">${msj}</b><br/>${msj_details}`,
             icon: 'warning',
             allowOutsideClick: false,
             confirmButtonText: 'Ok!',
           })
}

function verificarContras() {
    var contra = document.getElementById("contra").value; 
    var contraConfirmacion = document.getElementById("c_contra").value;
    if(contra != contraConfirmacion) {
        registrarseMostrarErrorMsj("Las contraseñas no coinciden.");
    } else {
        document.getElementById("fomulario").submit();
    }
}

function registrarseRegistroExitoso() {
    Swal.fire({
        title: 'Corpoturismo',
        html: 'Usuario Registrado con exito.<br/><h4>Porfavor revisar su correo electronico para continuar con el proceso de activación de la cuenta.</h4>',
        icon: 'success',
        allowOutsideClick: false,
        confirmButtonText: 'Continuar!',
      }).then((result) => {
       if(result.isConfirmed) {
          window.location.href = "login.php";
       }
      })
}

function loginErroneo() {
    Swal.fire({
        title: 'Corpoturismo',
        text: 'Usuario o contraseña icorrectos!',
        icon: 'warning'
      })
}

function loginNoPermitido() {
    Swal.fire({
        title: 'Corpoturismo',
        text: 'Usted se encuentra inactivo!',
        icon: 'info'
      })
}

function usuarioNoVerificado() {
    Swal.fire({
        title: 'Corpoturismo',
        text: 'Cuenta no verificada!, por favor verifique su correo y siga los pasos.',
        icon: 'info'
      })
}

function linkInvalido() {
    Swal.fire({
        title: 'Corpoturismo',
        html: 'El link de activacion es invalido.<br/><h4>Si cree que esto es un error por favor comuniquese con administración.</h4>',
        icon: 'warning',
        allowOutsideClick: false,
      }).then((result) => {
        if(result.isConfirmed) {
           window.location.href = "login.php";
        }
       })
}

function completarInformacionValido() {
    Swal.fire({
        title: 'Corpoturismo',
        html: 'Datos guardados con exito.<br/><h4>Su cuenta ha sido activada ya puede ingresar al sistema.</h4>',
        icon: 'success',
        allowOutsideClick: false,
        confirmButtonText: 'Continuar.',
      }).then((result) => {
       if(result.isConfirmed) {
        window.location.href = "login.php";
       }
      })
}

function usuarioCorreoNoEncontrado() {
    Swal.fire({
        title: 'Corpoturismo',
        html: 'El correo parece no estar relacionado a ningun usuario activo en el sistema.<br/><h4>Si cree que esto es un error porfavor comuniquese con administración.</h4>',
        icon: 'info',
      })
}

function correoCambioContraEnviado() {
    Swal.fire({
        title: 'Corpoturismo',
        html: 'Solicitud de cambio de contraseña enviado al correo, porfavor verifiquelo y siga los pasos.',
        icon: 'info',
        allowOutsideClick: false,
      }).then((result) => {
        if(result.isConfirmed) {
         window.location.href = "login.php";
        }
       })
}


function cambioContraExitoso() {
    Swal.fire({
        title: 'Corpoturismo',
        html: 'Su contraseña ha sido modificada exitosamente.',
        icon: 'success',
        allowOutsideClick: false,
      }).then((result) => {
        if(result.isConfirmed) {
         window.location.href = "login.php";
        }
       })
}
