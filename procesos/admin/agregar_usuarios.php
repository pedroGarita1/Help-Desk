<?php 
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    
    $datos = array(
       "paterno" => $_POST['paterno'],
       "materno" => $_POST['materno'],
       "nombre" => $_POST['nombre'],
       "fecha_nacimiento" => $_POST['fecha_nacimiento'],
       "sexo" => $_POST['sexo'],
       "telefono" => $_POST['telefono'],
       "correo" => $_POST['correo'],
       "usuario" => $_POST['usuario'],
       "password" => sha1($_POST['password']),
       "rol_usuario" => $_POST['rol_usuario'],
       "ubicacion" => $_POST['ubicacion']
    );
    echo $Usu->agregar_usuario($datos);
?>