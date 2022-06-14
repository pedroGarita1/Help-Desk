<?php 
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    $datos = array(
        "idUsuario" => $_POST['idUsuario'],
        "idPersona" => $_POST['idPersona']
    );
    echo $Usu->eliminar_usuario($datos);
?>