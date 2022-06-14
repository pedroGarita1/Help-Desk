$(() => {
    $('#tabla_reportes_load').load('view/tables/tabla_reportesCliente.php');

    function agregar_reportes() {
        $.ajax({
            type: 'POST',
            data: $('#frm_agregar_reporteC').serialize(),
            url: 'procesos/cliente/agregar_reporte.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#tabla_reportes_load').load('view/tables/tabla_reportesCliente.php');
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

    $('#btn_agregar_reportes').click(() => {
        agregar_reportes();
    });
});