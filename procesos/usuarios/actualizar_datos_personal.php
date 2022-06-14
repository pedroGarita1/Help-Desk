<?php
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    $idUsuario = $_SESSION['usuario']['id'];
    $datos = array(
        "paterno" => $_POST['paternoI'],
        "materno" => $_POST['maternoI'],
        "nombre" => $_POST['nombreI'],
        "telefono" => $_POST['telefonoI'],
        "correo" => $_POST['correoI'],
        "fecha" => $_POST['fechaI'],
        "idUsuario" => $idUsuario
    );
    echo $Usu->actualizar_datos_personal($datos);
?>