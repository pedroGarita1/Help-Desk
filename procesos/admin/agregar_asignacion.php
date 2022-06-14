<?php 
    session_start();
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Usu = new Usuarios();

    $datos = array(
        "persona" => $_POST['persona'],
        "dispositivo" => $_POST['dispositivo'],
        "marca" => $_POST['marca'],
        "modelo" => $_POST['modelo'],
        "color" => $_POST['color'],
        "descripcion" => $_POST['descripcion'],
        "memoria" => $_POST['memoria'],
        "disco_duro" => $_POST['disco_duro'],
        "procesador" => $_POST['procesador'],
    );
    echo $Usu->agregar_asignacion($datos);

?>