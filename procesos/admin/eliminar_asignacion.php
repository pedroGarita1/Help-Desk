<?php 
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();
    $idAsignacion = $_POST['idAsignacion'];
    echo $Usu->eliminar_asignacion($idAsignacion);
?>