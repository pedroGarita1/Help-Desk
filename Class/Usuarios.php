<?php 
    class Usuarios extends Conector{
        public function login_usuarios($usuario, $password){
            $conexion = Conector :: conexion();
            $usuario = $conexion->real_escape_string($usuario);
            $password = $conexion->real_escape_string($password);
            $consulta = "SELECT usuario, password, id_usuario, id_rol, estado FROM t_usuarios WHERE usuario = ? AND password = ?";
            $query = $conexion->prepare($consulta);
            $query->bind_param('ss',$usuario, $password);
            $query->execute();// true false
            $respuesta = $query->get_result();
            if($respuesta->num_rows > 0 ){
                $datosUsu = $respuesta->fetch_array();
                if($datosUsu['estado'] == 1){
                    $_SESSION['usuario']['nombre'] = $datosUsu['usuario'];
                    $_SESSION['usuario']['id'] = $datosUsu['id_usuario'];
                    $_SESSION['usuario']['rol'] = $datosUsu['id_rol'];
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
            $query->close();
        }
        public function mostrar_tabla_general(){
            $conexion = Conector :: conexion();
            $consulta = "SELECT * FROM tabla_general";
            $query = $conexion->prepare($consulta);
            $query->execute();
            $resultado = $query->get_result();
            $respuesta = $resultado->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $respuesta;
        }
        public function agregar_usuario($datos){
            $conexion = Conector :: conexion();
            $idPersona = self::agregar_persona($datos);
            if($idPersona > 0){
                $insersion = "INSERT INTO t_usuarios(id_rol, id_persona, usuario, password, ubicacion) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insersion);
                $query->bind_param('iisss', $datos['rol_usuario'], $idPersona, $datos['usuario'], $datos['password'], $datos['ubicacion']);
                $respuesta= $query->execute();
                $query->close();
                return $respuesta;
            }else{
                return 0;
            }
        }
        public function agregar_persona($datos){
            $conexion = Conector :: conexion();
            $insertar = "INSERT INTO helpdesk.t_persona (paterno, materno, nombre, fecha_nacimiento, sexo, telefono, correo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insertar);
            $query->bind_param('sssssss', $datos['paterno'], $datos['materno'], $datos['nombre'], $datos['fecha_nacimiento'], $datos['sexo'], $datos['telefono'], $datos['correo']);
            $query->execute();
            $idPersona = mysqli_insert_id($conexion);
            $query->close();
            return $idPersona;
        }
        public function obtener_datos_usuario($id_usuario){
            $conexion = Conector :: conexion();
            $id_usuario = $conexion->real_escape_string($id_usuario);
            $consulta = "SELECT * FROM tabla_general WHERE idUsuario = ?";
            $query = $conexion->prepare($consulta);
            $query->bind_param('i', $id_usuario);
            $query->execute();
            $respuesta = $query->get_result();
            $resultado = $respuesta->fetch_array();
            $datos = array(
                "idUsuario" => $resultado['idUsuario'],
                "nombreUsuario" => $resultado['nombreUsuario'],
                "rol" => $resultado['rol'],
                "idRol" => $resultado['idRol'],
                "ubicacion" => $resultado['ubicacion'],
                "estatus" => $resultado['estatus'],
                "idPersona" => $resultado['idPersona'],
                "nombre" => $resultado['nombre'],
                "paterno" => $resultado['paterno'],
                "materno" => $resultado['materno'],
                "fecha_nacimiento" => $resultado['fechaNacimiento'],
                "sexo" => $resultado['sexo'],
                "correo" => $resultado['correo'],
                "telefono" => $resultado['telefono']
            );
            $query->close();
            return $datos;
        }
        public function actualizar_usuario($datos){
            $conexion = Conector :: conexion();
            $persona = self::actualizar_persona($datos);
            if($persona){
                $update = "UPDATE t_usuarios SET id_rol = ?, usuario = ?, ubicacion = ? WHERE id_usuario = ?";
                $query = $conexion->prepare($update);
                $query->bind_param('issi',$datos['rol_usuario'],$datos['usuario'],$datos['ubicacion'],$datos['idUsuario']);
                $resultado = $query->execute();
                $query->close();
                return $resultado;
            }else{
                return 0;
            }
        }
        public function actualizar_persona($datos){
            $conexion = Conector :: conexion();
            $idPersona = self::obtener_id_persona($datos['idUsuario']);
            $update = "UPDATE t_persona SET paterno = ?, materno = ?, nombre = ?, fecha_nacimiento = ?, sexo = ?, telefono = ?, correo = ? WHERE id_persona = ?";
            $query = $conexion->prepare($update);
            $query->bind_param('sssssssi',$datos['paterno'],$datos['materno'],$datos['nombre'],$datos['fecha_nacimiento'],$datos['sexo'],$datos['telefono'],$datos['correo'],$idPersona);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function obtener_id_persona($idUsuario){
            $conexion = Conector :: conexion();
            $consulta = "SELECT persona.id_persona FROM t_usuarios AS usuarios INNER JOIN t_persona AS persona ON usuarios.id_persona = persona.id_persona AND usuarios.id_usuario = ?";
            $query = $conexion->prepare($consulta);
            $query->bind_param('i', $idUsuario);
            $query->execute();
            $respuesta = $query->get_result();
            $idPersona = $respuesta->fetch_array()['id_persona'];
            $query->close();
            return $idPersona;
        }
        public function mostrar_asignaciones(){
            $conexion = Conector :: conexion();
            $consulta = "SELECT id_equipo, nombre, descripcion FROM t_cat_equipo";
            $query = $conexion->prepare($consulta);
            $query->execute();
            $respuesta = $query->get_result();
            $resultado = $respuesta->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $resultado;
        }
        public function mostrar_personas(){
            $conexion = Conector :: conexion();
            $consulta = "SELECT persona.id_persona, CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona FROM t_persona AS persona INNER JOIN t_usuarios AS usuario ON persona.id_persona = usuario.id_persona AND usuario.id_rol = 1";
            $query = $conexion->prepare($consulta);
            $query->execute();
            $respuesta = $query->get_result();
            $resultado = $respuesta->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $resultado;
        }
        public function agregar_asignacion($datos){
            $conexion = Conector :: conexion();
            $insert = "INSERT INTO t_asignacion(id_persona, id_equipo, marca, modelo, color, descripcion, memoria, disco_duro, procesador) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insert);
            $query->bind_param('iisssssss', $datos['persona'], $datos['dispositivo'], $datos['marca'], $datos['modelo'], $datos['color'], $datos['descripcion'], $datos['memoria'], $datos['disco_duro'], $datos['procesador']);
            $resultado = $query->execute();
            $query->close();
            return $resultado;
        }
        public function mostrar_tabla_asignacion(){
            $conexion = Conector :: conexion();
            $consulta = " SELECT  persona.id_persona, CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona, equipo.id_equipo AS idEquipo, equipo.nombre AS nombreEquipo, asignacion.id_asignacion AS idAsignacion, asignacion.marca AS marca, asignacion.modelo AS modelo, asignacion.color AS color, asignacion.descripcion AS descripcion, asignacion.memoria AS memoria, asignacion.disco_duro AS discoDuro, asignacion.procesador AS procesador FROM helpdesk.t_asignacion AS asignacion INNER JOIN t_persona AS persona ON asignacion.id_persona = persona.id_persona INNER JOIN t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo";
            $query = $conexion->prepare($consulta);
            $query->execute();
            $respuesta = $query->get_result();
            $resultado = $respuesta->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $resultado;
        }
        public function eliminar_asignacion($id){
            $conexion = Conector :: conexion();
            $delete = "DELETE FROM t_asignacion WHERE id_asignacion = ?";
            $query = $conexion->prepare($delete);
            $query->bind_param('i', $id);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function mostrar_datos_cliente($id){
            $conexion = Conector :: conexion();
            $consulta0 = "SELECT persona.id_persona AS idPersona FROM t_usuarios AS usuario INNER JOIN t_persona AS persona ON usuario.id_persona = persona.id_persona AND usuario.id_usuario = ?";
            $query0 = $conexion->prepare($consulta0);
            $query0->bind_param('i', $id);
            $query0->execute();
            $respuesta0 = $query0->get_result();
            $idPersona = $respuesta0->fetch_array()['idPersona'];
            $query0->close();
            $consulta = "SELECT  persona.id_persona, CONCAT(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona, equipo.id_equipo AS idEquipo, equipo.nombre AS nombreEquipo, asignacion.id_asignacion AS idAsignacion, asignacion.marca AS marca, asignacion.modelo AS modelo, asignacion.color AS color, asignacion.descripcion AS descripcion, asignacion.memoria AS memoria, asignacion.disco_duro AS discoDuro, asignacion.procesador AS procesador FROM helpdesk.t_asignacion AS asignacion INNER JOIN t_persona AS persona ON asignacion.id_persona = persona.id_persona INNER JOIN t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo AND asignacion.id_persona = ?";
            $query = $conexion->prepare($consulta);
            $query->bind_param('i', $idPersona);
            $query->execute();
            $respuesta = $query->get_result();
            $resultado = $respuesta->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $resultado;
        }
        public function mostrar_dispositivos_cliente(){
            $conexion = Conector :: conexion();
            $idUsuario = $_SESSION['usuario']['id'];
            $consulta = "SELECT asignacion.id_asignacion AS idAsignacion, equipo.id_equipo AS idEquipo, equipo.nombre AS nombreEquipo FROM t_asignacion AS asignacion INNER JOIN t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo WHERE asignacion.id_persona = (SELECT id_persona FROM t_usuarios WHERE id_usuario = ?)";
            $query = $conexion->prepare($consulta);
            $query->bind_param('i', $idUsuario);
            $query->execute();
            $res = $query->get_result();
            $return = $res->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $return;
        }
        public function mostrar_tabla_reportes_cliente(){
            $conexion = Conector :: conexion();
            $idUsuario = $_SESSION['usuario']['id'];
            $consulta = "SELECT reporte.id_reporte AS idReporte, reporte.id_usuario AS idUsuario, concat(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona, equipo.id_equipo AS idEquipo, equipo.nombre AS nombreEquipo, reporte.descripcion_problema AS descProblema, reporte.estatus AS estatus, reporte.solucion_problema AS solucionProblema, reporte.fecha AS fecha FROM t_reportes AS reporte INNER JOIN t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario INNER JOIN t_persona AS persona ON usuario.id_persona = persona.id_persona INNER JOIN t_cat_equipo AS equipo ON reporte.id_equipo = equipo.id_equipo AND reporte.id_usuario = ?";
            $query = $conexion->prepare($consulta);
            $query->bind_param('i', $idUsuario);
            $query->execute();
            $res = $query->get_result();
            $return = $res->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $return;
        }
        public function agregar_reporte_cliente($datos){
            $conexion = Conector :: conexion();
            $insert = "INSERT INTO t_reportes(id_usuario, id_equipo, descripcion_problema) VALUES (?, ?, ?)";
            $query = $conexion->prepare($insert);
            $query->bind_param('iis', $datos['idUsuario'], $datos['idEquipo'], $datos['problema']);
            $resultado = $query->execute();
            $query->close();
            return $resultado;
        }
        public function eliminar_reporte_cliente($idReporte){
            $conexion = Conector :: conexion();
            $delete = "DELETE FROM t_reportes WHERE id_reporte = ?";
            $query = $conexion->prepare($delete);
            $query->bind_param('i', $idReporte);
            $resultado = $query->execute();
            $query->close();
            return $resultado;
        }
        public function mostrar_tabla_reportes_all(){
            $conexion = Conector :: conexion();
            $consulta = "SELECT reporte.id_reporte AS idReporte, reporte.id_usuario AS idUsuario, concat(persona.paterno, ' ', persona.materno, ' ', persona.nombre) AS nombrePersona, equipo.id_equipo AS idEquipo, equipo.nombre AS nombreEquipo, reporte.descripcion_problema AS descProblema, reporte.estatus AS estatus, reporte.solucion_problema AS solucionProblema, reporte.fecha AS fecha FROM t_reportes AS reporte INNER JOIN t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario INNER JOIN t_persona AS persona ON usuario.id_persona = persona.id_persona INNER JOIN t_cat_equipo AS equipo ON reporte.id_equipo = equipo.id_equipo";
            $query = $conexion->prepare($consulta);
            $query->execute();
            $res = $query->get_result();
            $return = $res->fetch_all(MYSQLI_ASSOC);
            $query->close();
            return $return;
        }
        public function obtener_dato_reporte($idReporte){
            $conexion = Conector :: conexion();
            $consulta = "SELECT solucion_problema, estatus FROM t_reportes WHERE id_reporte = ?";
            $query = $conexion->prepare($consulta);
            $query->bind_param('i', $idReporte);
            $query->execute();
            $respuesta = $query->get_result();
            $reporte = $respuesta->fetch_array();
            $datos = array(
                "idReporte" => $idReporte,
                "solucion" => $reporte['solucion_problema'],
                "estatus" => $reporte['estatus']
            );
            $query->close();
            return $datos;
        }
        public function actualizar_reporte($datos){
            $conexion = Conector :: conexion();
            $update = "UPDATE t_reportes SET id_usuario_tecnico = ?, solucion_problema = ?, estatus = ? WHERE id_reporte = ?";
            $query = $conexion->prepare($update);
            $query->bind_param('issi', $datos['idUsuario'], $datos['solucion'], $datos['estatus'], $datos['idReporte']);
            $result = $query->execute();
            $query->close();
            return $result;
        }
        public function actualizar_datos_personal($datos){
            $conexion = Conector :: conexion();
            $consulta0 = "SELECT persona.id_persona AS idPersona FROM t_usuarios AS usuario INNER JOIN t_persona AS persona ON usuario.id_persona = persona.id_persona AND usuario.id_usuario = ?";
            $query0 = $conexion->prepare($consulta0);
            $query0->bind_param('i', $datos['idUsuario']);
            $query0->execute();
            $respuesta0 = $query0->get_result();
            $idPersona = $respuesta0->fetch_array()['idPersona'];
            $update = "UPDATE t_persona SET paterno = ?, materno = ?, nombre = ?, telefono = ?, correo = ?, fecha_nacimiento = ? WHERE id_persona = ?";
            $query = $conexion->prepare($update);
            $query->bind_param('ssssssi', $datos['paterno'], $datos['materno'], $datos['nombre'], $datos['telefono'], $datos['correo'], $datos['fecha'], $idPersona);
            $resultado = $query->execute();
            $query->close();
            return $resultado;
        }
        public function actualizar_password($datos){
            $conexion = Conector :: conexion();
            $update = "UPDATE t_usuarios SET password = ? WHERE id_usuario = ?";
            $query = $conexion->prepare($update);
            $query->bind_param('si', $datos['password'], $datos['idUsuario']);
            $resultado = $query->execute();
            $query->close();
            return $resultado;
        }
        public function cambiar_estado($datos){
            $conexion = Conector :: conexion();
            $update = "UPDATE t_usuarios SET estado = ? WHERE id_usuario = ?";
            $query = $conexion->prepare($update);
            $query->bind_param('ii', $datos['estado'], $datos['idUsuario']);
            $resultado = $query->execute();
            $query->close();
            return $resultado;
        }
        public function buscar_reportes($idUsuario){
            $conexion = Conector :: conexion();
            $buscar = "SELECT * FROM t_reportes WHERE id_usuario = ?";
            $query = $conexion->prepare($buscar);
            $query->bind_param('i', $idUsuario);
            $query->execute();
            $re = $query->get_result();
            if($re->num_rows >0){
                return 1;
            }else{
                return 0;
            }
            $query->close();
        }
        public function buscar_asignacion($idPersona){
            $conexion = Conector :: conexion();
            $buscar = "SELECT * FROM t_asignacion WHERE id_persona = ?";
            $query = $conexion->prepare($buscar);
            $query->bind_param('i', $idPersona);
            $query->execute();
            $re = $query->get_result();
            if($re->num_rows >0){
                return 1;
            }else{
                return 0;
            }
            $query->close();
        }
        public function eliminar_usuario($datos){
            $conexion = Conector :: conexion();
            $reportes = self::buscar_reportes($datos['idUsuario']);
            $asignacion = self::buscar_asignacion($datos['idPersona']);
            if($reportes == 0 && $asignacion == 0){
                $delete = "DELETE FROM t_usuarios WHERE id_usuario = ?";
                $query = $conexion->prepare($delete);
                $query->bind_param('i', $datos['idUsuario']);
                $resultado = $query->execute();
                $query->close();
                return $resultado;
            }else{
                return 0;
            }
        }
    }
?>