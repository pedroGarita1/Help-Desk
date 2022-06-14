$(() => {
    $('#usuarios_load').load("view/tables/tabla_usuarios.php");

    function agregar_usuario() {
        if ($('#sexo').val() == 'vacio') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Agrega el sexo del usuario'
            });
            return false;
        } else if ($('#rol_usuario').val() == 'vacio') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Agrega el rol del usuario'
            });
            return false;
        } else {
            $.ajax({
                type: 'POST',
                data: $('#frm_agregar_usuario').serialize(),
                url: 'procesos/admin/agregar_usuarios.php',
                success: (r) => {
                    r = r.trim();
                    if (r == 1) {
                        $('#frm_agregar_usuario')[0].reset();
                        $('#usuarios_load').load("view/tables/tabla_usuarios.php");
                        Swal.fire(
                            'AGREGADO CON EXITO !!',
                            'Se ha agregado correctamente un usuario',
                            'success'
                        )
                    } else {
                        console.log(r);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo agregar el usuario'
                        })
                    }
                }
            });
        }
        return false;
    }

    $('#btn_agregar_usuario').click(() => {
        agregar_usuario();
    });
});

function obtener_datos(idUsuario) {
    $.ajax({
        type: 'POST',
        data: "idUsuario=" + idUsuario,
        url: "procesos/admin/obtener_datos.php",
        success: (r) => {
            // r = JSON.parse(r);
            consola.log(r);
        }
    });
    return false;
}