<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
       require_once 'config/config.php';
       require_once 'config/librerias.php';
    ?>
    <title>Help-Desk</title>
</head>
<body>
<?php 
    session_start();
    if(isset($_GET['view'])){
        $url = explode("/", $_GET['view']);
        if(count($url) < 2){
            switch($url[0]){
// -------------------------------- GENERAL -------------------------------- \\
                case 'login':
                    require_once 'view/login.php';
                    break;
                case 'inicio':
                    require_once 'view/inicio.php';
                    break;
// -------------------------------- CLIENTE -------------------------------- \\
                case 'cliente-dispositivos':
                    require_once 'view/cliente/view_dispositivos.php';
                    break;
                case 'cliente-reportes' :
                    require_once 'view/cliente/view_reportes.php';
                    break;
// ------------------------------------------------------------------------- \\
// --------------------------------- ADMIN --------------------------------- \\
                case 'admin-reportes':
                    require_once 'view/admin/view_reportes.php';
                    break;
                case 'admin-asignaciones':
                    require_once 'view/admin/view_asignacion.php';
                    break;
                case 'admin-usuarios':
                    require_once 'view/admin/view_usuarios.php';
                    break;
// ------------------------------------------------------------------------- \\
                default :
                    require_once 'view/404.php';
                    break;
            }
        }else header("location:".SERVIDOR ."404");
    }else require_once 'view/login.php';
?>
</body>
</html>