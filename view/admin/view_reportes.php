<?php 
    require_once 'view/navbar.php';
    if(isset($_SESSION['usuario']['nombre']) && $_SESSION['usuario']['rol'] == 2 ){
?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Reportes</h1>
            <p class="lead">
                <div class="col-md-12">
                    <div id="tabla_reporte_admin_load"></div>
                </div>
            </p>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/admin/controlador_reportes.js" type="module"></script>
<?php 
    require_once 'view/modals/modal_agregar_solucionAdmin.php';
}else header('location:login')?>