function cargarTurnosUsuariosPorRecalada(n_recalada, nombre_recalada, numeroInscritos) {
    if(numeroInscritos == 0) {
        Swal.fire({
            title: 'Corpoturismo',
            html: 'Actualmente esta recalda no tiene inscripciones.',
            icon: 'info',
          })
    } else if(n_recalada && nombre_recalada) {
        location.href=`turno_recalada.php?recalada=${n_recalada}&nombre=${nombre_recalada}`;
    }
}

function redirigirMismaPaginaActual(nombre_recalada, numero_recalada) {
    location.href=`turno_recalada.php?recalada=${numero_recalada}&nombre=${nombre_recalada}`;
}

function redireccionarTurnos() {
    location.href = "recalada.php";
}