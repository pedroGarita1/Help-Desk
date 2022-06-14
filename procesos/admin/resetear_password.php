<?php 
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    
    $datos = array(
        "idUsuario" => $_POST['idUsuario_pass'], 
        "password" => sha1($_POST['new_password'])
    );
    echo $Usu->actualizar_password($datos);
?>