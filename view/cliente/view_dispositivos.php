<?php 
    require_once 'view/navbar.php';
    if(isset($_SESSION['usuario']['nombre']) && $_SESSION['usuario']['rol'] == 1 ){
        require_once 'Class/Conector.php';
        require_once 'Class/Usuarios.php';
        $Usu = new Usuarios();
        $idUsuario = $_SESSION['usuario']['id'];
        $datos = $Usu->mostrar_datos_cliente($idUsuario);
?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Mis Dispositivos</h1>
            <p class="lead">
                <hr>
                <div class="row">
                <?php foreach($datos AS $mostrar):?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?= $mostrar['nombreEquipo'];?></h3>
                                <p class="card-text">
                                    <div class="row"><hr>
                                    <p>Descripcion: <?= $mostrar['descripcion'];?></p>
                                    <ul class="list-group">
                                        <li class="list-group-item active" aria-current="true">Hadware</li>
                                        <li class="list-group-item">Marca: <?= $mostrar['marca'];?></li>
                                        <li class="list-group-item">Modelo: <?= $mostrar['modelo'];?></li>
                                        <li class="list-group-item">Color: <?= $mostrar['color'];?></li>
                                        <li class="list-group-item">Memoria: <?= $mostrar['memoria'];?></li>
                                        <li class="list-group-item">Disco duro: <?= $mostrar['discoDuro'];?></li>
                                        <li class="list-group-item">Procesador: <?= $mostrar['procesador'];?></li>
                                    </ul>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
            </p>
        </div>
    </div>
</div>
<?php }else header('location:login')?>