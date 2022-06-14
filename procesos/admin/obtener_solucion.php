<?php
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios;
    $idReporte = $_POST['idReporte'];
    $array = $Usu->obtener_dato_reporte($idReporte);
    $datos = json_encode($array);
    print_r($datos);
?>