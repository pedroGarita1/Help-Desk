$(() => {
    function resetear_password() {
        $.ajax({
            type: 'POST',
            data: $('#frm_reset_password').serialize(),
            url: 'procesos/admin/resetear_password.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    Swal.fire(
                        'ACTUALIZADO CON EXITO !!',
                        'Se actualizo correctamente la contraseña',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo  cambiar la contraseña'
                    })
                }
            }
        });
    }

    $('#btn_reset_password').click(() => {
        resetear_password();
    });
});