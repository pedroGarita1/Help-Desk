$(() => {
    $('#tabla_asignaciones_load').load("view/tables/tabla_asignacion.php");

    function agregar_asignacion() {
        $.ajax({
            type: 'POST',
            data: $('#frm_agregar_asignacion').serialize(),
            url: 'procesos/admin/agregar_asignacion.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#frm_agregar_asignacion')[0].reset();
                    $('#tabla_asignaciones_load').load("view/tables/tabla_asignacion.php");
                    Swal.fire(
                        'AGREGADO CON EXITO !!',
                        'Se agrego correctamente la asignacion',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo agregar la asignacion'
                    })
                }
            }
        });
        return false;
    }

    $('#btn_agregar_asignacion').click(() => {
        agregar_asignacion();
    });
});