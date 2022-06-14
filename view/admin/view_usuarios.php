<?php 
    require_once 'view/navbar.php';
    if(isset($_SESSION['usuario']['nombre']) && $_SESSION['usuario']['rol'] == 2 ){
    ?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h3 class="fw-light">Administrar Usuarios</h3>
            <p class="lead">
                <div class="col-md-12 text-center">
                    <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#agregar_usuario">Agregar Usuario</button>
                </div>
                <div class="col-md-12 mt-3">
                    <div id="usuarios_load"></div>
                </div>
            </p>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/admin/controlador_agregar_usuario.js" type="module"></script>
<script src="<?=SERVIDOR?>controller/admin/controlador_actualizar_usuarios.js" type="module"></script>
<script src="<?=SERVIDOR?>controller/admin/controlador_resetear_password.js" type="module"></script>
<script>
    function obtener_datos(idUsuario) {
        // alert('hola');
        $.ajax({
            type: 'POST',
            data: "idUsuario=" + idUsuario,
            url: "procesos/admin/obtener_datos.php",
            success: (r) => {
                r = crearCadena(r);
                $('#idUsuario').val(r[0]['idUsuario']);
                $('#paternou').val(r[0]['paterno']);
                $('#maternou').val(r[0]['materno']);
                $('#nombreu').val(r[0]['nombre']);
                $('#fecha_nacimientou').val(r[0]['fecha_nacimiento']);
                $('#sexou').val(r[0]['sexo']);
                $('#telefonou').val(r[0]['telefono']);
                $('#correou').val(r[0]['correo']);
                $('#usuariou').val(r[0]['nombreUsuario']);
                $('#rol_usuariou').val(r[0]['idRol']);
                $('#ubicacionu').val(r[0]['ubicacion']);
            }
        });
        function crearCadena(json) {
            var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed) {
                arr.push(parsed[x]);
            }
            return parsed;
        }
        return false;
    }
    function cambiar_estado (idUsuario,estado){
        $.ajax({
            type: 'POST',
            data: {'idUsuario':  idUsuario, 'estado': estado},
            url: 'procesos/admin/cambiar_estado.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#usuarios_load').load("view/tables/tabla_usuarios.php");
                } 
            }
        });
    }

    function eliminar_usuario(idUsuario, idPersona) {
        $.ajax({
            type: 'POST',
            data: {'idUsuario':  idUsuario, 'idPersona': idPersona},
            url: 'procesos/admin/eliminar_usuario.php',
            success: (r) => {
                r = r.trim();
                if (r == 1) {
                    $('#usuarios_load').load("view/tables/tabla_usuarios.php");
                    $('#actualizar_usuario').modal('hide');
                    Swal.fire(
                        'ELIMINADO CON EXITO !!',
                        'Se elimino el usuario con exito',
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo  el usuario'
                    })
                }
            }
        });
    }
</script>
<?php 
        require_once 'view/modals/modal_agregar_usuario.php';
        require_once 'view/modals/modal_reset_password.php';
        require_once 'view/modals/modal_actualizar_usuario.php';
    }else header('location:login')
?>
