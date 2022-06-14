$(() => {
    function actualizar_personal() {
        $.ajax({
            type: 'POST',
            data: $('#frm_actualizar_personales').serialize(),
            url: 'procesos/usuarios/actualizar_datos_personal.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#tabla_reportes_load').load('view/tables/tabla_reportesCliente.php');
                    Swal.fire(
                        'ACTUALIZADO CON EXITO !!',
                        'Se ha actualizado correctamente el usuario',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo actualizar el usuario'
                    })
                }
            }
        });
    }

    $('#btn_actualizar_personal').click(() => {
        actualizar_personal();
    });
})