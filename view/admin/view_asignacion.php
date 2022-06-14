<?php 
    require_once 'view/navbar.php';
    if(isset($_SESSION['usuario']['nombre']) && $_SESSION['usuario']['rol'] == 2 ){
        require_once 'Class/Conector.php';
        require_once 'Class/Usuarios.php';
        $Usu = new Usuarios();
        $datosAsig = $Usu->mostrar_asignaciones();
        $datosPers = $Usu->mostrar_personas();
?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h3 class="fw-light">Asignacion de equipos</h3>
            <p class="lead">
                <div class="col-md-12 text-center">
                    <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modal_asignar_equipo">Asignar equipo</button>
                    <hr>
                </div>
                <div id="tabla_asignaciones_load"></div>
            </p>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/admin/controlador_agregar_asignacion.js" type="module"></script>
<script>
    function eliminar_asignacion(idAsignacion){
        $.ajax({
            type: 'POST',
            data: 'idAsignacion=' + idAsignacion,
            url: 'procesos/admin/eliminar_asignacion.php',
            success: (r) =>{
                r = r.trim();
                if (r == 1) {
                    $('#tabla_asignaciones_load').load("view/tables/tabla_asignacion.php");
                    Swal.fire(
                        'ELIMINADO CON EXITO !!',
                        'Se ha eliminado correctamente el usuario',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo eliminar el usuario'
                    })
                }
            }
        });
        return false;
    }
</script>
<?php 
    require_once 'view/modals/modal_agregar_asignar.php';
}else header('location:login')?>