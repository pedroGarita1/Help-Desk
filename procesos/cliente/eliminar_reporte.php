<?php
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();

    $idReporte = $_POST['idReporte'];
    
    echo $Usu->eliminar_reporte_cliente($idReporte);
?>