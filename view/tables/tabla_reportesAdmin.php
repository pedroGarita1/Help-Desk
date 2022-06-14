<?php
    require_once '../../Class/Conector.php';
    require_once '../../Class/Usuarios.php';
    session_start();
    $Usu = new Usuarios();
    $tabla = $Usu->mostrar_tabla_reportes_all();
    $contador = 1;
?>
<table class="table" id="t_info_general" style="width: 100%;">
    <thead>
        <th>#</th>
        <th>Persona</th>
        <th>Dispositivo</th>
        <th>Fecha</th>
        <th>Descripcion</th>
        <th>Estatus</th>
        <th>Solucion</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php foreach($tabla AS $mostrar):?>
        <tr>
            <td><?= $contador++?></td>
            <td><?= $mostrar['nombrePersona']?></td>
            <td><?= $mostrar['nombreEquipo']?></td>
            <td><?= $mostrar['fecha']?></td>
            <td><?= $mostrar['descProblema']?></td>
            <?php 
                $estatus = $mostrar['estatus'];
                $solucion = $mostrar['solucionProblema'];
                if($estatus == 1){
            ?>
            <td><span class="btn btn-success">Abierto</span></td>
            <?php }elseif($estatus == 0){?>
                <td><span class="btn btn-danger">Cerrado</span></td>
            <?php }?>
            <td>
                <span data-bs-toggle="modal" data-bs-target="#modal_solucionA" onclick="obtener_datos_solucion(<?= $mostrar['idReporte']?>)" class="btn btn-info">solucion</span>
            </td>
            <td>
                <?php if($solucion == ""){?>
                    <span onclick="eliminar_reporte(<?= $mostrar['idReporte']?>)" id="btn_eliminar_reporte" class="btn btn-danger"><i class="fa-solid fa-delete-left"></i></span>
                <?php }else{?>
                    Restringido
                <?php }?>
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

    function eliminar_reporte(idReporte){
        $.ajax({
            type: 'POST',
            data: 'idReporte=' + idReporte,
            url: 'procesos/cliente/eliminar_reporte.php',
            success: (r) =>{
                r = r.trim();
                if (r == 1) {
                    $('#tabla_reportes_load').load('view/tables/tabla_reportesAdmin.php');
                    Swal.fire(
                        'ELIMINADO CON EXITO !!',
                        'Se ha eliminado correctamente el reporte',
                        'success'
                    )
                } else {
                    console.log(r);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se pudo eliminar el reporte'
                    })
                }
            }
        });
        return false;
    }
    function obtener_datos_solucion(idReporte){
        $.ajax({
            type: 'POST',
            data: 'idReporte=' + idReporte,
            url: 'procesos/admin/obtener_solucion.php',
            success: (r) => {
                r = crearCadena(r);
                $('#idReporte').val(r['idReporte']);
                $('#solucion').val(r['solucion']);
                $('#estatus').val(r['estatus']);
            }
        });
    }
    function crearCadena(json) {
        var parsed = JSON.parse(json);
        var arr = [];
        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return parsed;
    }
</script>