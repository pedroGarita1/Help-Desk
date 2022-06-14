function obtener_datos_usuario(idUsuario) {
    $.ajax({
        type: 'POST',
        data: 'idUsuario=' + idUsuario,
        url: 'procesos/usuarios/obtener_datos_inicio.php',
        success: (r) => {
            r = crearCadena(r);
            console.log(r);
            $('#idUsuario').text(r['idUsuario']);
            $('#paterno').text(r['paterno']);
            $('#materno').text(r['materno']);
            $('#nombre').text(r['nombre']);
            $('#edad').text(r['fecha_nacimiento']);
            $('#telefono').text(r['telefono']);
            $('#correo').text(r['correo']);
            //-------------------------------------------------
            $('#idUsuarioI').val(r['idUsuario']);
            $('#paternoI').val(r['paterno']);
            $('#maternoI').val(r['materno']);
            $('#nombreI').val(r['nombre']);
            $('#fechaI').val(r['fecha_nacimiento']);
            $('#telefonoI').val(r['telefono']);
            $('#correoI').val(r['correo']);
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