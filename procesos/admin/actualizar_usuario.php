<?php 
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    
    $datos = array(
        "idUsuario" => $_POST['idUsuario'], 
        "paterno" => $_POST['paternou'],
        "materno" => $_POST['maternou'],
        "nombre" => $_POST['nombreu'],
        "fecha_nacimiento" => $_POST['fecha_nacimientou'],
        "sexo" => $_POST['sexou'],
        "telefono" => $_POST['telefonou'],
        "correo" => $_POST['correou'],
        "usuario" => $_POST['usuariou'],
        "rol_usuario" => $_POST['rol_usuariou'],
        "ubicacion" => $_POST['ubicacionu']
    );
    echo $Usu->actualizar_usuario($datos);
?>