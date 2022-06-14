<?php 
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    $id_usuario = $_POST['idUsuario'];
    $array = $Usu->obtener_datos_usuario($id_usuario);
    $datos = json_encode($array);
    print_r($datos);
?>