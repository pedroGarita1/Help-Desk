<?php 
    if(isset($_SESSION['usuario']['nombre']) && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2 ){
        $idUsuario = $_SESSION['usuario']['id'];
    require_once 'view/navbar.php';
?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h3 class="fw-light">Bienvenido - <?= $_SESSION['usuario']['nombre']?></h3>
            <p class="lead">
                <div class="row">
                    <div class="col-md-4 mb-3">Apellido Paterno: <strong><span id="paterno"></span></strong></div>
                    <div class="col-md-4 mb-3">Apellido Materno: <strong><span id="materno"></span></strong></div>
                    <div class="col-md-4 mb-3">Nombre: <strong><span id="nombre"></span></strong></div>
                    <div class="col-md-4 mb-3">Telefono: <strong><span id="telefono"></span></strong></div>
                    <div class="col-md-4 mb-3">Correo: <strong><span id="correo"></span></strong></div>
                    <div class="col-md-4 mb-3">Edad: <strong><span id="edad"></span></strong></div>
                </div>
            </p>
        </div>
    </div>
</div>
<script src="<?=SERVIDOR?>controller/user/controlador_inicio.js"></script>
<script src="<?=SERVIDOR?>controller/user/controlador_actualizar_personal.js"></script>
<script>
    let idUsuario = '<?= $idUsuario?>';
    obtener_datos_usuario(idUsuario);
</script>
<?php }else header('location:login')?>