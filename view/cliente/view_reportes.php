<?php 
    require_once 'view/navbar.php';
    if(isset($_SESSION['usuario']['nombre']) && $_SESSION['usuario']['rol'] == 1 ){
        require_once 'Class/Conector.php';
        require_once 'Class/Usuarios.php';
        $Usu = new Usuarios();
        $select = $Usu->mostrar_dispositivos_cliente();
?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Reportes de cliente</h1>
            <p class="lead">
                <hr>
                <div class="col-md-12 text-center mb-3">
                    <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modal_reportes">Crear Reporte</button>
                </div>
                <div class="col-md-12">
                    <div id="tabla_reportes_load"></div>
                </div>
            </p>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/cliente/controlador_reportes.js" type="module"></script>
<?php 
    require_once 'view/modals/modal_crear_reporte.php';
}else header('location:login')?>
