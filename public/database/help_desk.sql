-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-08-2021 a las 19:10:17
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `helpdesk`
--
CREATE DATABASE IF NOT EXISTS `helpdesk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `helpdesk`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

DROP TABLE IF EXISTS `t_cat_roles`;
CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'cliente', 'Es un cliente'),
(2, 'admin', 'Es Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

DROP TABLE IF EXISTS `t_persona`;
CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` varchar(245) NOT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

DROP TABLE IF EXISTS `t_usuarios`;
CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text,
  `estado` int(11) NOT NULL DEFAULT 1
  `fecha_insert`DATETIME NOT NULL DEFAULT now()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkPersona_idx` (`id_persona`),
  ADD KEY `fkRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fkPersona` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkRoles` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

CREATE VIEW `tabla_general` AS
SELECT 
	usuarios.id_usuario AS idUsuario,
    usuarios.usuario AS nombreUsuario,
	roles.nombre AS rol,
	usuarios.id_rol AS idRol,
    usuarios.ubicacion AS ubicacion,
    usuarios.estado AS estatus,
    usuarios.password AS password,
    usuarios.id_persona AS idPersona,
    persona.nombre AS nombre,
    persona.paterno AS paterno,
    persona.materno AS materno,
    persona.fecha_nacimiento AS fechaNacimiento,
    persona.sexo AS sexo,
    persona.correo AS correo,
    persona.telefono AS telefono
FROM 
t_usuarios AS usuarios
	INNER JOIN
    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
    INNER JOIN
    t_persona AS persona ON usuarios.id_persona = persona.id_persona;
CREATE TABLE `helpdesk`.`t_cat_equipo` (
  `id_equipo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(245) NOT NULL,
  `descripcion` VARCHAR(245) NULL,
  `insert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_equipo`));
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('PC');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Laptop');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Mouse');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Teclado');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Monitor');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Bocinas');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Microfono');
INSERT INTO `helpdesk`.`t_cat_equipo` (`nombre`) VALUES ('Proyector');
CREATE TABLE `helpdesk`.`t_asignacion` (
  `id_asignacion` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NOT NULL,
  `id_equipo` INT NOT NULL,
  `marca` VARCHAR(245) NULL,
  `modelo` VARCHAR(245) NULL,
  `color` VARCHAR(245) NULL,
  `descripcion` VARCHAR(245) NULL,
  `memoria` VARCHAR(45) NULL,
  `disco_duro` VARCHAR(45) NULL,
  `procesador` VARCHAR(45) NULL,
  `insert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_asignacion`));
ALTER TABLE `helpdesk`.`t_asignacion` 
ADD INDEX `fk_persona_idx` (`id_persona` ASC);
;
ALTER TABLE `helpdesk`.`t_asignacion` 
ADD CONSTRAINT `fk_persona`
  FOREIGN KEY (`id_persona`)
  REFERENCES `helpdesk`.`t_persona` (`id_persona`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
ALTER TABLE `helpdesk`.`t_asignacion` 
ADD INDEX `fk_equipo_idx` (`id_equipo` ASC);
;
ALTER TABLE `helpdesk`.`t_asignacion` 
ADD CONSTRAINT `fk_equipo`
  FOREIGN KEY (`id_equipo`)
  REFERENCES `helpdesk`.`t_cat_equipo` (`id_equipo`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
USE `helpdesk`;
CREATE  OR REPLACE VIEW `new_view` AS
 SELECT 
    persona.id_persona,
    CONCAT(persona.paterno,
            ' ',
            persona.materno,
            ' ',
            persona.nombre) AS nombrePersona,
    equipo.id_equipo AS idEquipo,
    equipo.nombre AS nombrePersona,
    asignacion.id_asignacion AS idAsignacion,
    asignacion.marca AS marca,
    asignacion.modelo AS modelo,
    asignacion.color AS color,
    asignacion.descripcion AS descripcion,
    asignacion.memoria AS memoria,
    asignacion.disco_duro AS discoDuro,
    asignacion.procesador AS procesador
FROM
    helpdesk.t_asignacion AS asignacion
        INNER JOIN
    t_persona AS persona ON asignacion.id_persona = persona.id_persona
        INNER JOIN
    t_cat_equipo AS equipo ON asignacion.id_equipo = equipo.id_equipo;;
CREATE TABLE `helpdesk`.`t_reportes` (
  `id_reporte` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `id_equipo` INT NOT NULL,
  `id_usuario_tecnico` INT NULL,
  `descripcion_problema` TEXT NOT NULL,
  `solucion_problema` TEXT NOT NULL,
  `estatus` INT NOT NULL DEFAULT 1,
  `fecha` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_reporte`));
ALTER TABLE `helpdesk`.`t_reportes` 
ADD INDEX `fkUsuarioR_idx` (`id_usuario` ASC),
ADD INDEX `fkEquipoR_idx` (`id_equipo` ASC);
;
ALTER TABLE `helpdesk`.`t_reportes` 
ADD CONSTRAINT `fkUsuarioR`
  FOREIGN KEY (`id_usuario`)
  REFERENCES `helpdesk`.`t_usuarios` (`id_usuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fkEquipoR`
  FOREIGN KEY (`id_equipo`)
  REFERENCES `helpdesk`.`t_cat_equipo` (`id_equipo`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;