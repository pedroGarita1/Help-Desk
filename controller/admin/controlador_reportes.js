$(() => {
    $('#tabla_reporte_admin_load').load('view/tables/tabla_reportesAdmin.php');

    function agregar_solucion_reporte() {
        $.ajax({
            type: 'POST',
            data: $('#frm_solucion_admin').serialize(),
            url: 'procesos/admin/agregar_solucion.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#tabla_reporte_admin_load').load('view/tables/tabla_reportesAdmin.php');
                    Swal.fire(
                        'AGREGADO CON EXITO !!',
                        'Se ha agregado correctamente la solucion',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo agregar la solucion'
                    })
                }
            }
        });
    }

    $('#btn_agregar_solucion').click(() => {
        agregar_solucion_reporte();
    });
});