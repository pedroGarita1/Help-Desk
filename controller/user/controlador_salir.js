$(() => {
    function salir_sesion() {
        $.ajax({
            url: 'procesos/usuarios/salir.php',
            success: (r) => {
                r = r.trim();
                console.log(r);
                if (r == 1) {
                    Swal.fire(
                        'SALIENDO DE LA SESION!',
                        'Espera Mientras cerramos tu sesion',
                        'success'
                    )
                    setTimeout(() => {
                        window.location = "login";
                    }, 2000);
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No pudimos serrar tu sesion'
                    })
                }
            }
        });
    }
    $('#btn_salir').click(() => {
        salir_sesion();
    });
});