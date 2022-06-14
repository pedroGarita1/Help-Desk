<?php
session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();

    $idUsuario = $_SESSION['usuario']['id'];
    $datos = array(
        "idEquipo" => $_POST['dispositivo'],
        "problema" => $_POST['problema'],
        "idUsuario" => $idUsuario
    );
    
    echo $Usu->agregar_reporte_cliente($datos);
?>