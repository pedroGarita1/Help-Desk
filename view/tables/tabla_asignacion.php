<?php 
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    $Ad = new Usuarios();
    $datos = $Ad->mostrar_tabla_asignacion();
?>
<table class="table" id="t_info_general" style="width: 100%;">
    <thead>
        <th>Nombre persona</th>
        <th>Tipo de dispositivo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Color</th>
        <th>Descripcion</th>
        <th>Memoria</th>
        <th>Disco Duro</th>
        <th>Procesador</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php foreach($datos AS $mostrar):?>
        <tr>
            <td><?= $mostrar['nombrePersona']?></td>
            <td><?= $mostrar['nombreEquipo']?></td>
            <td><?= $mostrar['marca']?></td>
            <td><?= $mostrar['modelo']?></td>
            <td><?= $mostrar['color']?></td>
            <td><?= $mostrar['descripcion']?></td>
            <td><?= $mostrar['memoria']?></td>
            <td><?= $mostrar['discoDuro']?></td>
            <td><?= $mostrar['procesador']?></td>
            <td>
                <span onclick="eliminar_asignacion(<?= $mostrar['idAsignacion']?>)" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></span>
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