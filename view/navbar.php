<?php require_once 'view/modals/modal_actualizar_personales.php';?>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
    <div class="container">
        <a class="navbar-brand" href="#">H e l p  -  D e s k</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
        <!-- --------------------------------------------- CLIENTE --------------------------------------------- -->
                <li class="nav-item active">
                    <a class="nav-link" href="inicio">Inicio</a>
                </li>
                <?php if ($_SESSION['usuario']['rol'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link" href="cliente-dispositivos">Mis Dispositivos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cliente-reportes">Reportes Soportes</a>
                </li>
        <!-- --------------------------------------------------------------------------------------------------- -->
        <!-- ---------------------------------------------- ADMIN ---------------------------------------------- -->
                <?php }elseif($_SESSION['usuario']['rol'] == 2){?>
                <li class="nav-item">
                    <a class="nav-link" href="admin-usuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-asignaciones">Asignacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-reportes">Reportes</a>
                </li>
                <?php }?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario: <?= $_SESSION['usuario']['nombre'];?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><span onclick="obtener_datos_usuario(<?= $idUsuario?>)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal_actualizar_personales">Editar Datos</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <span class="dropdown-item" id="btn_salir">Salir</span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="<?=SERVIDOR?>controller/user/controlador_salir.js" type="module"></script>