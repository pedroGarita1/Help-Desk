$(() => {
    function loginUsuario() {
        $.ajax({
            type: 'POST',
            data: $('#form_login').serialize(),
            url: 'procesos/usuarios/login.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    Swal.fire(
                        'INICIANDO SESION!',
                        'Espera Mientras iniciamos tu sesion!',
                        'success'
                    )
                    setTimeout(() => {
                        window.location = "inicio";
                    }, 2000);
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo Iniciar sesion'
                    })
                }
            }
        });
        return false;
    }

    $('#btn_entrar').click(() => {
        loginUsuario();
    });
});