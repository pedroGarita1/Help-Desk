<?php 
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Ad = new Usuarios();
    $datos = $Ad->mostrar_tabla_general();
    $fetcha_actual = date("y-m-d");
?>
<table class="table" id="t_info_general" style="width: 100%;">
    <thead>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Usuario</th>
        <th>Ubicacion</th>
        <th>Sexo</th>
        <th>Reset Password</th>
        <th>Estado</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php foreach($datos AS $mostrar):?>
        <tr>
            <td><?= $mostrar['paterno'];?></td>
            <td><?= $mostrar['materno'];?></td>
            <td><?= $mostrar['nombre'];?></td>
            <?php $edad = date_diff(date_create($mostrar['fechaNacimiento']),date_create($fetcha_actual))?>
            <td><?= $edad->format('%y');?></td>
            <td><?= $mostrar['telefono'];?></td>
            <td><?= $mostrar['correo'];?></td>
            <td><?= $mostrar['nombreUsuario'];?></td>
            <td><?= $mostrar['ubicacion'];?></td>
            <td><?= $mostrar['sexo'];?></td>
            <td><button data-bs-toggle="modal" data-bs-target="#modal_reset_password" class="btn tbn-sm btn-warning"><i class="fa-solid fa-passport"></i></button></td>
            <?php if($mostrar['estatus'] == 1){?>
                <td><button onclick="cambiar_estado(<?= $mostrar['idUsuario']?>, 0)" class="btn btn-success">Activo</button></td>
            <?php }elseif($mostrar['estatus'] == 0){?>
                <td><button onclick="cambiar_estado(<?= $mostrar['idUsuario']?>, 1)" class="btn btn-danger">Inactivo</button></td>
            <?php }?>
            <td>
                <button onclick="obtener_datos(<?= $mostrar['idUsuario'];?>)" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#actualizar_usuario">
                    <i class="fa-solid fa-user-pen"></i>
                </button>
            </td>
            <td>
                <button onclick="eliminar_usuario(<?= $mostrar['idUsuario'];?>,<?= $mostrar['idPersona'];?>)" class="btn btn-sm btn-danger"><i class="fa-solid fa-user-minus"></i></button>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<script>
    $(() => {
        let t_info_general = $('#t_info_general').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons : {
                buttons : [
                    { extend : 'copy', className : 'btn btn-outline-info', text : '<i class="fa-solid fa-copy"></i> Copiar' },
                    { extend : 'excel', className : 'btn btn-outline-success', text : '<i class="fa-solid fa-file-excel"></i> Exel' },
                    { extend : 'pdf', className : 'btn btn-outline-danger', text : '<i class="fa-solid fa-file-pdf"></i> PDF' },
                    { extend : 'print', className : 'btn btn-outline-warning', text : '<i class="fa-solid fa-print"></i> Print' },
                ],
                dom : {
                    button : {
                        className : 'btn'
                    }
                }
            }
        });
        new $.fn.dataTable.FixedHeader(t_info_general);
    });

    
</script>