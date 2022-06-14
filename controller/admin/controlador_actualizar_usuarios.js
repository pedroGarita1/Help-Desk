$(() => {
    function actualizar_usuario() {
        $.ajax({
            type: 'POST',
            data: $('#frm_actualizar_usuario').serialize(),
            url: 'procesos/admin/actualizar_usuario.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#usuarios_load').load("view/tables/tabla_usuarios.php");
                    $('#actualizar_usuario').modal('hide');
                    Swal.fire(
                        'ACTUALIZADO CON EXITO !!',
                        'Se actualizo correctamente el usuario',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo  el usuario'
                    })
                }
            }
        });
    }

    $('#btn_actualizar_usuario').click(() => {
        actualizar_usuario();
    });
});