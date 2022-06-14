<?php
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();

    $datos = array(
        "idReporte" => $_POST['idReporte'],
        "solucion" => $_POST['solucion'],
        "estatus" => $_POST['estatus'],
        "idUsuario" => $_SESSION['usuario']['id']
    );
    echo $Usu->actualizar_reporte($datos);
?>