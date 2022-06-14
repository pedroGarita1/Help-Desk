<?php
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();

    $datos = array (
        "idUsuario" => $_POST['idUsuario'],
        "estado" => $_POST['estado']
    );
    echo $Usu->cambiar_estado($datos);
?>