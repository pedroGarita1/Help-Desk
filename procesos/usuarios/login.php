<?php 
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();

    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);

    echo $Usu->login_usuarios($usuario, $password);
?>