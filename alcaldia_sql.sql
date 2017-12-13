-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-12-2017 a las 00:53:04
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alcaldia_sql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `NUM_ALE` int(11) NOT NULL COMMENT 'NUMERO CONSECUTIVO DE LA ALERTA',
  `COD_DOC` varchar(3) DEFAULT NULL COMMENT 'CODIGO DEL DOCUMENTO',
  `DIA_ALE` smallint(6) DEFAULT NULL COMMENT 'DIAS ANTES DEL VENCIMIENTO PARA INICIAR LA ALERTA',
  `ORD_ALE` int(11) DEFAULT NULL COMMENT 'ORDEN DE LAS ALERTAS DEL TIPO DE DOCUMENTO, ESTO PARA SABER CUANTAS ALARMAS POR TIPO DE DOCUMENTO HAY',
  `COL_ALE` varchar(30) DEFAULT NULL COMMENT 'COLOR DE LA ALERTA, SE ALMACENA COMO COLOR ESTANDAR EN LA WEB HEXADECIMAL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LAS ALERTAS A EJECUTARSEN EN ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexo_pqrsf_ent`
--

CREATE TABLE `anexo_pqrsf_ent` (
  `NUM_ANE` int(11) NOT NULL COMMENT 'NUMERO CONSECUTIVO DEL ANEXO ASIGNADO POR EL SISTEMA',
  `NUM_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO CONSECUTIVO DE LA PQRSF. TABLA PQRSF_ENT',
  `ANIO_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO DE A?O DE TRABAJO DEL SISTEMA. TABLA PQRSF_ENT',
  `PATH_ANE` varchar(500) DEFAULT NULL COMMENT 'PATH O RUTA DE ACCESO DEL ARCHIVO ESCANEADO EN EL DISCO DURO DEL SERVIDOR.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS DATOS ANEXOS ESCANEADOS A';

--
-- Volcado de datos para la tabla `anexo_pqrsf_ent`
--

INSERT INTO `anexo_pqrsf_ent` (`NUM_ANE`, `NUM_PQR`, `ANIO_PQR`, `PATH_ANE`) VALUES
(96, 1, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_1'),
(97, 1, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_2'),
(98, 1, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_3'),
(99, 2, 2015, 'uploads/2_2015_Derecho de petición, 2_2015_1'),
(100, 3, 2015, 'uploads/3_2015_Derecho de petición, 3_2015_1'),
(101, 4, 2015, 'uploads/4_2015_Acción de tutela, 4_2015_1'),
(102, 5, 2015, 'uploads/5_2015_Convocatoria, 5_2015_1'),
(103, 4, 2017, 'uploads/4_2017_Petición, 4_2017_1'),
(104, 5, 2017, 'uploads/5_2017_Cancelación, 5_2017_1'),
(105, 6, 2017, 'uploads/6_2017_Solicitud, 6_2017_1'),
(106, 7, 2017, 'uploads/7_2017_Querellas, 7_2017_1'),
(107, 8, 2017, 'uploads/8_2017_Información, 8_2017_1'),
(108, 9, 2017, 'uploads/9_2017_Comunicado, 9_2017_1'),
(109, 10, 2017, 'uploads/10_2017_Comunicado, 10_2017_1'),
(110, 11, 2017, 'uploads/11_2017_Informe, 11_2017_1'),
(111, 12, 2017, 'uploads/12_2017_Cancelación, 12_2017_1'),
(112, 12, 2017, 'uploads/12_2017_Cancelación, 12_2017_2'),
(113, 13, 2017, 'uploads/13_2017_Citación, 13_2017_1'),
(114, 14, 2017, 'uploads/14_2017_Cancelación, 14_2017_1'),
(115, 15, 2017, 'uploads/15_2017_Cancelación, 15_2017_1'),
(116, 15, 2017, 'uploads/15_2017_Cancelación, 15_2017_2'),
(117, 18, 2017, 'uploads/18_2017_Acción de tutela, 18_2017_1.jpg'),
(118, 21, 2017, 'uploads/21_2017_21_2017_1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexo_pqrsf_sal`
--

CREATE TABLE `anexo_pqrsf_sal` (
  `NUM_ANE_SAL` int(11) NOT NULL COMMENT 'NUMERO CONSECUTIVO DEL ANEXO ASIGNADO POR EL SISTEMA',
  `NUM_PQR_SAL` int(11) DEFAULT NULL COMMENT 'NUMERO CONSECUTIVO DE LA RESPUESTA AL PQRSF',
  `ANIO_PQR_SAL` int(11) DEFAULT NULL COMMENT 'A?O DE TRABAJO DE LA RESPUESTA AL PQRSF',
  `PATH_ANE_SAL` varchar(500) DEFAULT NULL COMMENT 'PATH O RUTA DE ACCESO DEL ARCHIVO ESCANEADO EN EL DISCO DURO DEL SERVIDOR.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS DATOS ANEXOS ESCANEADOS A';

--
-- Volcado de datos para la tabla `anexo_pqrsf_sal`
--

INSERT INTO `anexo_pqrsf_sal` (`NUM_ANE_SAL`, `NUM_PQR_SAL`, `ANIO_PQR_SAL`, `PATH_ANE_SAL`) VALUES
(12, 4, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_1'),
(13, 5, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_1'),
(14, 6, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_1'),
(15, 7, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_1'),
(16, 7, 2015, 'uploads/1_2015_Derecho de petición, 1_2015_2'),
(17, 8, 2015, 'uploads/3_2015_Derecho de petición, 3_2015_1'),
(18, 9, 2015, 'uploads/3_2015_Derecho de petición, 3_2015_1'),
(19, 10, 2015, 'uploads/3_2015_Derecho de petición, 3_2015_1'),
(26, 17, 2017, 'uploads/5_2017_Cancelación, 5_2017_1'),
(27, 18, 2017, 'uploads/5_2017_Cancelación, 5_2017_1'),
(28, 19, 2017, 'uploads/4_2017_Petición, 4_2017_1'),
(29, 20, 2017, 'uploads/6_2017_Solicitud, 6_2017_1'),
(30, 21, 2017, 'uploads/6_2017_Solicitud, 6_2017_1'),
(31, 22, 2017, 'uploads/7_2017_Querellas, 7_2017_1'),
(33, 24, 2017, 'uploads/8_2017_Información, 8_2017_1'),
(34, 25, 2017, 'uploads/10_2017_Comunicado, 10_2017_1'),
(35, 26, 2017, 'uploads/11_2017_Informe, 11_2017_1'),
(36, 27, 2017, 'uploads/8_2017_Información, 8_2017_1'),
(37, 27, 2017, 'uploads/8_2017_Información, 8_2017_2'),
(39, 29, 2017, 'uploads/10_2017_Comunicado, 10_2017_1'),
(41, 31, 2017, 'uploads/10_2017_Comunicado, 10_2017_1'),
(42, 32, 2017, 'uploads/7_2017_Querellas, 7_2017_1'),
(43, 33, 2017, 'uploads/14_2017_Cancelación, 14_2017_1'),
(44, 33, 2017, 'uploads/14_2017_Cancelación, 14_2017_2'),
(45, 34, 2017, 'uploads/15_2017_Cancelación, 15_2017_1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE `dependencia` (
  `COD_DEP` varchar(3) NOT NULL COMMENT 'CODIGO DE LA DEPENDENCIA',
  `NOM_DEP` varchar(100) DEFAULT NULL COMMENT 'NOMBRE DE LA DEPENDENCIA',
  `PRE_DEP` int(11) DEFAULT NULL COMMENT 'NUMERO PREFIJO UTILIZADO POR LA DEPENDENCIA',
  `NUM_INT_ENT_DEP` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO DE ARCHIVO DE LAS PQRSF QUE INGRESAN.',
  `NUM_INT_SAL_DEP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LAS DEPENDENCIAS DE LA PERSON';

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`COD_DEP`, `NOM_DEP`, `PRE_DEP`, `NUM_INT_ENT_DEP`, `NUM_INT_SAL_DEP`) VALUES
('DAF', 'DIRECCION ADMINISTRATIVA Y FINANCIERA', 111, 3, 1),
('DES', 'DESPACHO', 110, 13, 1),
('DTE', 'DEPENDENCIA TEMPORAL', 100, 2, 1),
('MNP', 'MINISTERIO PUBLICO', 112, 3, 1),
('SRP', 'SERVICIO PUBLICOS', 113, 7, 1),
('VAD', 'VIGILANCIA ADMINISTRATIVA', 114, 3, 1),
('VEN', 'VENTANILLA UNICA', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `COD_DOC` varchar(3) NOT NULL COMMENT 'CODIGO DEL DOCUMENTO',
  `NOM_DOC` varchar(100) DEFAULT NULL COMMENT 'NOMBRE DEL DOCUMENTO',
  `ORD_DOC` int(11) DEFAULT NULL COMMENT 'ORDEN DEL DOCUMENTO, SE UTILIZA CON EL FIN DE ORDENAR LOS DOCUMENTOS COMO DESEA EL USUARIO DE VENTANILLA UNICA DESDE LOS MAS HABITUALES',
  `NUM_DIAS` smallint(6) DEFAULT NULL COMMENT 'NUMERO DE DIAS PARA EL VENCIMIENTO DEL TERMINO, SE CONFIGURA DE ACUERDO AL TIPO DE DOCUMENTO. SINO TIENE VENCIMIENTO DE TERMINOS SE DEJA EN CERO.\r\n            \r\n            ESTE CAMPO ES PRIMORDIAL PARA LA GESTION DE LAS ALERTAS AUTOMATICAS'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS TIPOS DE DOCUMENTO ACEPTA';

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`COD_DOC`, `NOM_DOC`, `ORD_DOC`, `NUM_DIAS`) VALUES
('ACP', 'Accion popular', 25, 13),
('ATU', 'Acción de tutela', 26, 6),
('CAN', 'Cancelación', 17, 1),
('CIT', 'Citación', 9, 1),
('CMC', 'Comunicado', 19, 1),
('CNV', 'Convocatoria', 21, 2),
('COM', 'Comisorios', 15, 2),
('CPE', 'Copia petición', 23, 1),
('CPI', 'Copia', 24, 1),
('DEP', 'Derecho de petición', 1, 15),
('DEV', 'Devolución', 2, 2),
('EXC', 'Excusa', 20, 1),
('IND', 'Incidente de desataco', 27, 17),
('INF', 'Información', 6, 3),
('INR', 'Informe', 7, 1),
('INV', 'Invitación', 4, 2),
('MCA', 'Medida cautelar', 18, 4),
('NOT', 'Notificación', 11, 3),
('PET', 'Petición', 5, 2),
('PRS', 'Procesos', 29, 4),
('PTI', 'Protección de tierras', 16, 155),
('QRL', 'Querellas', 28, 1),
('QUE', 'Queja', 8, 4),
('RAP', 'Recurso de apelación', 30, 6),
('RES', 'Respuesta', 3, 3),
('RMS', 'Remisión', 22, 3),
('RSL', 'Resolución', 14, 4),
('SEG', 'Seguimiento', 12, 1),
('SOL', 'Solicitud', 13, 1),
('TRS', 'Traslado', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `COD_FUN` varchar(30) NOT NULL COMMENT 'CODIGO UNICO DEL FUNCIONARIO CON EL CUAL ACCEDE AL SISTEMA.',
  `COD_DEP` varchar(3) DEFAULT NULL COMMENT 'CODIGO DE LA DEPENDENCIA AL CUAL PERTENECE EL FUNCIONARIO. TABLA DEPENDENCIA',
  `NOM_FUN` varchar(100) DEFAULT NULL COMMENT 'NOMBRE DEL FUNCIONARIO',
  `NUM_DOC_FUN` varchar(15) DEFAULT NULL COMMENT 'NUMERO DE DOCUMENTO DE IDENTIFICACION DEL FUNCIONARIO',
  `TIPO_FUN` varchar(1) DEFAULT NULL COMMENT 'TIPO DE FUNCIONARIO, P: PLANTA, C: CONTRATISTA',
  `JEF_FUN` varchar(1) DEFAULT NULL COMMENT 'FUNCIONARIO JEFE DE DEPENDENCIA S o N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR TODOS LOS FUNCIONARIOS QUE TR';

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`COD_FUN`, `COD_DEP`, `NOM_FUN`, `NUM_DOC_FUN`, `TIPO_FUN`, `JEF_FUN`) VALUES
('funserv1', 'SRP', 'FUNCIONARIO SERV 1', '222222222222222', 'P', 'N'),
('funserv2', 'SRP', 'FUNCIONARIO SERV 2', '322222222222222', 'C', 'N'),
('heber.guifo', 'DAF', 'Heber guifo', '222222222222', 'P', 'S'),
('hector.barragan', 'VEN', 'hectorbarrangan', '1110464444', 'P', 'N'),
('jefe.mpublico', 'MNP', 'Jefe ministerio publico', '33333333333333', 'P', 'S'),
('jefe.servicios', 'SRP', 'Jefe Servicios publicos', '44444444444444', 'P', 'S'),
('jefe.vigilancia', 'VAD', 'Jefe vigilancia administrativa', '5555555555555', 'P', 'S'),
('personero', 'DES', 'JEFE DESPACHO', '111111111111111', 'P', 'S'),
('sadmin', 'DTE', 'Super Administrador', '0', 'P', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_cron_job`
--

CREATE TABLE `log_cron_job` (
  `NUM_CRON` int(11) NOT NULL,
  `NOM_CRON` varchar(50) DEFAULT NULL,
  `FEC_EJE_CRON` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS DATOS DE EJECUCION DE LOS';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `COD_MEN` varchar(3) NOT NULL,
  `NOM_MEN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS MENUS PRINCIPALES DE LA A';

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`COD_MEN`, `NOM_MEN`) VALUES
('1', 'Menu Principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `PATH_PAG` varchar(200) NOT NULL COMMENT 'RUTA DE ACCESO DE LA PAGINA WEB',
  `COD_MEN` varchar(3) DEFAULT NULL,
  `NOM_PAG` varchar(100) DEFAULT NULL COMMENT 'NOMBRE DE LA PAGINA WEB - EL QUE APARECE EN EL MENU',
  `TIP_PAG` varchar(1) DEFAULT NULL COMMENT 'TIPO DE PAGINA - SI ES PAGINA DE MENU PRINCIPAL O SUBMENU. P: PADRE MENU PRINCIPAL, H: HIJA SUBMENU',
  `ORD_PAG` smallint(6) DEFAULT NULL COMMENT 'ORDEN DE LA PAGINA EN EL MENU',
  `VIS_PAG` varchar(1) DEFAULT NULL COMMENT 'VISIBILIDAD DE LA PAGINA EN LA APLICACION.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LAS PAGINAS WEB DEL SITIO CON';

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`PATH_PAG`, `COD_MEN`, `NOM_PAG`, `TIP_PAG`, `ORD_PAG`, `VIS_PAG`) VALUES
('asignarPqrsf', '1', 'Asignación PQRSF', 'P', 2, 'N'),
('dependencias', '1', 'Dependencias', 'P', 4, 'S'),
('documentoRadicacion', '1', 'Clases Documento', 'P', 5, 'S'),
('funcionarios', '1', 'Funcionarios', 'P', 9, 'S'),
('impresionPqrsfEnt', '1', 'Impresión PQRSF', 'P', 11, 'S'),
('parametros', '1', 'Parámetros', 'P', 6, 'S'),
('radicarPqrsf', '1', 'Radicar PQRSF', 'P', 1, 'S'),
('reasignarPqrsf', '1', 'Reasignar PQRSF', 'P', 10, 'S'),
('reporteEntrega', '1', 'Reporte entrega', 'P', 12, 'S'),
('reporteGeneral', '1', 'Reporte multicriterios', 'P', 13, 'S'),
('roles', '1', 'Roles', 'P', 7, 'S'),
('seguimientoPqrsf', '1', 'Seguimiento PQRSF', 'P', 3, 'S'),
('tipoDocumento', '1', 'Típos de documento', 'P', 8, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_rol`
--

CREATE TABLE `pagina_rol` (
  `COD_ROL` varchar(3) NOT NULL,
  `PATH_PAG` varchar(200) NOT NULL COMMENT 'RUTA DE ACCESO DE LA PAGINA WEB'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagina_rol`
--

INSERT INTO `pagina_rol` (`COD_ROL`, `PATH_PAG`) VALUES
('ADM', 'dependencias'),
('ADM', 'documentoRadicacion'),
('ADM', 'funcionarios'),
('ADM', 'parametros'),
('ADM', 'roles'),
('ADM', 'tipoDocumento'),
('CIN', 'reporteEntrega'),
('CIN', 'reporteGeneral'),
('FUN', 'reporteGeneral'),
('FUN', 'seguimientoPqrsf'),
('JDP', 'impresionPqrsfEnt'),
('JDP', 'reasignarPqrsf'),
('JDP', 'reporteGeneral'),
('JDP', 'seguimientoPqrsf'),
('PER', 'asignarPqrsf'),
('PER', 'impresionPqrsfEnt'),
('PER', 'radicarPqrsf'),
('PER', 'reasignarPqrsf'),
('PER', 'reporteEntrega'),
('PER', 'reporteGeneral'),
('PER', 'seguimientoPqrsf'),
('SEC', 'asignarPqrsf'),
('SEC', 'impresionPqrsfEnt'),
('SEC', 'radicarPqrsf'),
('SEC', 'reporteEntrega'),
('SEC', 'reporteGeneral'),
('SEC', 'seguimientoPqrsf'),
('VEN', 'asignarPqrsf'),
('VEN', 'impresionPqrsfEnt'),
('VEN', 'radicarPqrsf'),
('VEN', 'reasignarPqrsf'),
('VEN', 'reporteEntrega'),
('VEN', 'reporteGeneral'),
('VEN', 'seguimientoPqrsf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `COD_PAR` char(10) NOT NULL,
  `NOM_PAR` varchar(100) DEFAULT NULL,
  `VAL_PAR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS PARAMETROS GENERALES DEL ';

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`COD_PAR`, `NOM_PAR`, `VAL_PAR`) VALUES
('ANIOSIS', 'AÑO DE TRABAJO DEL SISTEMA', '2017'),
('NUMPQR', 'CONSECUTIVO PQRSF DE ENTRADA DEL SISTEMA', '24'),
('NUMPQRSAL', 'CONSECUTIVO PQRSF DE SALIDA', '9'),
('NUMPQRSEG', 'CONSECUTIVO DE SEGUIMIETO PARA PQRSF', '35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `NUM_PER` int(11) NOT NULL COMMENT 'NUMERO CONSECUTIVO DE PERSONA ASIGNADO POR EL SISTEMA',
  `COD_TIP_PER` varchar(2) DEFAULT NULL COMMENT 'CODIGO DE TIPO DE PERSONA. PN: PERSONA NATURAL, PJ: PERSONA JURIDICA, AN: ANONIMO. TABLA TIPO_PERSONA',
  `COD_TIP_DOC` char(3) DEFAULT NULL COMMENT 'TIPO DE DOCUMENTO DE LA PERSONA NATURAL, JURIDICA O ANONIMA. TABLA TIPO_DOCUMENTO',
  `NUM_DOC_PER` varchar(15) DEFAULT NULL COMMENT 'NUMERO DE DOCUMENTO DE IDENTIDAD DE LA PERSONA NATURAL, JURIDICA O ANONIMA',
  `NOM_PER` varchar(50) DEFAULT NULL COMMENT 'NOMBRES DE LA PERSONA',
  `APE_PER` varchar(50) DEFAULT NULL COMMENT 'APELLIDOS DE LA PERSONA',
  `GEN_PER` varchar(1) DEFAULT NULL COMMENT 'GENEROS DE LA PERSONA. F: FEMENINO, M: MASCULINO',
  `DIR_CON_PER` varchar(200) DEFAULT NULL COMMENT 'DIRECCION DE CONTACTO DE LA PERSONA',
  `EMAIL_PER` varchar(100) DEFAULT NULL COMMENT 'DIRECCION ELECTRONICA DE CORRESPONDENCIA DE LA PERSONA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS DATOS PERSONALES DE LAS P';

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`NUM_PER`, `COD_TIP_PER`, `COD_TIP_DOC`, `NUM_DOC_PER`, `NOM_PER`, `APE_PER`, `GEN_PER`, `DIR_CON_PER`, `EMAIL_PER`) VALUES
(118, 'PN', 'CED', '1110464422', 'Juan carlos', 'zamorano', 'M', 'mz 31 casa 16 A', 'jc_5@gmail.com'),
(119, 'PN', 'CED', '123456789', 'Juan carlos', 'zamorano', 'M', 'mz 31 casa 16 A', 'jc_5@gmail.com'),
(120, 'PN', 'CED', '65432789', 'carlos', 'restrepo', 'M', 'ibague', 'carlos@hotmail.com'),
(121, 'PJ', 'CED', '3453453', 'sdfasdfas', 'sdfsdfsdfs', 'M', 'asdfasdfasd', 'sdfsdfasdfa@kjshdk.com'),
(122, 'PN', 'CED', '1234567', 'Jaime', 'Lopez', 'M', 'Bogotá', 'jaime@llllll.ooo'),
(123, 'PN', 'CED', '123456', 'LOLA', 'Lopez', 'F', 'Bogotá', 'lola@llllll.ooo'),
(124, 'PN', 'CEX', '987765', 'pepe', 'p', 'M', 'Bogotá', 'pepe@p.com'),
(125, 'PN', 'CED', '456321', 'Ramón', 'Ramos', 'M', 'Roncesvalles', 'ramon@rr.com'),
(126, 'PN', 'CED', '456654', 'Nacho', 'Vidal', 'M', 'choco', 'nacho@vvv.com'),
(127, 'PN', 'CED', '123321', 'Obama', 'perez', 'M', 'eu', 'eu@jjj.com'),
(128, 'PN', 'CED', '3423432', 'fdfdfsd', 'dfsdfsdf', 'M', 'dfdfdf', 'ivanvin@asshgaj.dcd'),
(129, 'PJ', 'CEX', '556545', 'fdfdfsd', 'dfsdfsdf', 'M', 'dfdfdf', 'ivanvi3en@asshgaj.dcd'),
(130, 'PN', 'CEX', '5444354', 'fdfdfsd', 'dfsdfsdf', 'M', 'dfdfdf', 'ivanvi3en@asshgaj.dcd'),
(131, 'PN', 'CEX', '54645645', 'fdfdfsd', 'fdfbvc', 'M', 'dfdfdf', 'ivanvi3en@asshgaj.dcd'),
(132, 'PN', 'CEX', '4546454', 'fdfdfsd', 'dfsdfsdf', 'M', 'dfdfdf', 'ivanvi3en@asshgaj.dcd'),
(133, 'PN', 'CED', '5454566556', 'cvcvvc', 'vcvcv', 'M', 'dfdfdf', 'ivanvi3en@asshgaj.dcd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_telefono`
--

CREATE TABLE `persona_telefono` (
  `NUM_PER` int(11) NOT NULL COMMENT 'NUMERO CONSECUTIVO DE LA PERSONA. TABLA PERSONA',
  `NUM_TEL_PER` varchar(15) NOT NULL COMMENT 'NUMERO TELEFONICO DE LA PERSONA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS NUMEROS TELEFONICOS QUE T';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrsf_ent`
--

CREATE TABLE `pqrsf_ent` (
  `NUM_PQR` int(11) NOT NULL COMMENT 'NUMERO INTERNO PQRSF QUE ASIGNA EL SISTEMA',
  `ANIO_PQR` int(11) NOT NULL COMMENT 'A?O DE TRABAJO DEL SISTEMA',
  `NUM_INT_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO DE LA PQRSF POR DEPENDENCIA',
  `NUM_PER` int(11) DEFAULT NULL COMMENT 'NUMERO CONSECUTIVO DE PERSONA. PUEDE SER NATURAL, JURIDICA O ANONIMA. TABLA PERSONA',
  `COD_DOC` varchar(3) DEFAULT NULL COMMENT 'TIPO DE DOCUMENTO DE PQRSF, TIPOS DE PETICIONES. TABLA DOCUMENTO',
  `COD_FUN` varchar(30) DEFAULT NULL COMMENT 'CODIGO UNICO DEL FUNCIONARIO QUIEN TIENE ASIGNADO LA PQRSF. TABLA FUNCIONARIO.',
  `FEC_RAC_PQR` date DEFAULT NULL COMMENT 'FECHA DE RADICACION DE LA PQRSF',
  `HOR_RAC_PQR` datetime DEFAULT NULL COMMENT 'FECHA Y HORA DE RADICACION DE LA PQRSF',
  `ASU_PQR` varchar(200) DEFAULT NULL COMMENT 'ASUNTO DE LA PQRSF',
  `CAN_FOL_PQR` smallint(6) DEFAULT NULL COMMENT 'CANTIDAD DE FOLIOS O HOJAS QUE COMPONEN LA PQRSF',
  `COD_FUN_ENT` varchar(30) DEFAULT NULL COMMENT 'CODIGO FUNCIONARIO QUIEN RECIBE LA RADICACION. NO ES MODIFICABLE DESDE LA APLICACION',
  `NUM_OFI_ENT` varchar(30) DEFAULT NULL COMMENT 'NUMERO DE OFICIO RECIBIDO CUANDO SE RECIBE UNA COPIA DE UNA PQRSF',
  `OBS_PQR` varchar(300) DEFAULT NULL COMMENT 'OBSERVACIONES ACERCA DEL PQRSF',
  `DES_PQR` varchar(500) DEFAULT NULL COMMENT 'DESCRIPCION DEL CASO PQRSF',
  `NUM_TIC_PQR` varchar(20) DEFAULT NULL COMMENT 'NUMERO DE TICKET ALFANUMERICO DE 20 CARACTERES DE LA PQRSF PARA PODER CONSULTAR Y HACER SEGUIMIENTO AL CASO VIA WEB.',
  `TIPO_COR_ENT` varchar(1) DEFAULT NULL COMMENT 'TIPO DE CORRESPONDENCIA (INTERNA-EXTERNA)',
  `GEN_REP` varchar(1) DEFAULT NULL COMMENT 'GENERACION DE REPORTE ESTO CON EL FIN DE LLEVAR UN CONTROL CUANDO SE GENERA UN REPORTE DE ENTREGA',
  `TIP_PQR_ENT` varchar(1) DEFAULT NULL COMMENT 'TIPO DE PQRSF. W: WEB, P: PRESENCIAL',
  `FEC_MAX_RES` date DEFAULT NULL COMMENT 'FECHA MAXIMA DE RESPUESTA QUE SE CALCULA CON BASE AL TIPO DE DOCUMENTO Y LOS DIAS DEL VENCIMIENTO DEL TERMINO',
  `FEC_ENT_DEP_PQR` date DEFAULT NULL COMMENT 'FECHA DE ENTREGA AL JEFE DE DEPENDENCIA O ASIGNACION AL JEFE DE DEPENDENCIA',
  `FEC_CIE_PQR` date DEFAULT NULL COMMENT 'FECHA DE CIERRE DEL CASO PQRSF O FECHA DE ARCHIVADO EL CASO',
  `EST_PQR` varchar(1) DEFAULT 'A' COMMENT 'ESTADO DE LA PQRSF',
  `COP_PQR` varchar(1) DEFAULT NULL COMMENT 'INDICA SI ES UNA COPIA DE UNA PETICION O NO',
  `IMP` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Determina si ya fue impreso',
  `DEV` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LAS PQRSF QUE SE RECIBEN DE L';

--
-- Volcado de datos para la tabla `pqrsf_ent`
--

INSERT INTO `pqrsf_ent` (`NUM_PQR`, `ANIO_PQR`, `NUM_INT_PQR`, `NUM_PER`, `COD_DOC`, `COD_FUN`, `FEC_RAC_PQR`, `HOR_RAC_PQR`, `ASU_PQR`, `CAN_FOL_PQR`, `COD_FUN_ENT`, `NUM_OFI_ENT`, `OBS_PQR`, `DES_PQR`, `NUM_TIC_PQR`, `TIPO_COR_ENT`, `GEN_REP`, `TIP_PQR_ENT`, `FEC_MAX_RES`, `FEC_ENT_DEP_PQR`, `FEC_CIE_PQR`, `EST_PQR`, `COP_PQR`, `IMP`, `DEV`) VALUES
(1, 2015, 1, 118, 'DEP', 'funserv1', '2015-12-26', '2015-12-26 15:26:02', 'Servicios publicos alumbrado', 5, 'hector.barragan', 'A21', 'Muy caro el recibo', 'El recibo me llego caro porque no lo entregaron a tiempo.', 'U8WASSBL2WZYDWDGXNGN', 'E', NULL, 'P', '2016-01-10', NULL, NULL, 'A', 'N', 0, 0),
(2, 2015, 2, NULL, 'DEP', 'jefe.servicios', '2015-12-28', '2015-12-27 23:03:40', 'demanda ibal', 1, 'hector.barragan', '1233333', 'algunas observaciones', 'esta es una version anonima', 'E4YOCL86FRR4THK49428', 'E', NULL, 'P', '2016-01-12', NULL, NULL, 'A', 'N', 0, 0),
(3, 2015, 3, 119, 'DEP', 'jefe.servicios', '2015-12-28', '2015-12-27 23:11:21', 'demanda ibal', 2, 'hector.barragan', '1233', 'Alguna observacion', 'se envia una kfjdakfjsdka', '5N7QM2EB2ADK0EDADY3V', 'E', NULL, 'P', '2016-01-12', NULL, NULL, 'A', 'N', 0, 0),
(4, 2015, 1, 120, 'ATU', 'jefe.mpublico', '2017-12-01', '2017-12-01 12:57:56', 'exclamacion al montaje de casa', 12, 'hector.barragan', '234234', 'kljahdkljhasdfhklasdf', 'asjdlkfjhaskldfhaklsdhflkajhsdkfhjaksdf', 'C47P0HMRXBED367VZ5A4', 'I', NULL, 'P', '2017-12-07', NULL, NULL, 'A', 'N', 0, 0),
(4, 2017, 4, 122, 'PET', 'jefe.servicios', '2017-12-01', '2017-12-01 13:40:20', 'Agua', 1, 'heber.guifo', '345', 'hola', 'agua', 'KQCNY7FGMAZEDWO6MKJ2', 'E', NULL, 'P', '2017-12-03', NULL, NULL, 'A', 'N', 0, 0),
(5, 2015, 1, 121, 'CNV', 'heber.guifo', '2017-12-01', '2017-12-01 13:08:28', 'sdfasdfasdf', 5, 'hector.barragan', '5326345', 'asdfasdfasdf', 'asdasdfasdfasdf', 'JVCG9ELP4CS8JS3VJC9Z', 'E', NULL, 'P', '2017-12-03', NULL, NULL, 'A', 'N', 1, 0),
(5, 2017, 5, 123, 'CAN', 'jefe.servicios', '2017-12-01', '2017-12-01 13:52:49', 'Agua', 1, 'personero', '123', 'agua', 'cancelacion de agua', '506RNR4BK5Z98MTVJ5AT', 'E', NULL, 'P', '2017-12-02', NULL, NULL, 'A', 'N', 0, 0),
(6, 2017, 1, 124, 'SOL', 'jefe.vigilancia', '2017-12-01', '2017-12-01 15:14:59', 'Robo', 2, 'personero', '12', 'p', 'videos de seguridad&nbsp;', 'N3SIH6MOD00EO11V79AU', 'E', NULL, 'P', '2017-12-02', NULL, NULL, 'A', 'N', 0, 0),
(7, 2017, 1, 125, 'QRL', 'jefe.mpublico', '2017-12-01', '2017-12-01 15:47:29', 'basura', 1, 'hector.barragan', '786', 'basuras', 'mal manejo de residuos', 'B5UIUNBL59SB2WVEY3N1', 'I', NULL, 'P', '2017-12-02', NULL, NULL, '1', 'N', 0, 0),
(8, 2017, 2, 126, 'INF', 'personero', '2017-12-01', '2017-12-01 15:55:11', 'fiestas', 3, 'personero', '34', 'información', 'recursos invertidos en las fiestas', 'W4M7G20X92FKR65XY0TE', 'E', NULL, 'P', '2017-12-04', NULL, NULL, 'A', 'N', 0, 0),
(9, 2017, 2, 127, 'CMC', 'jefe.vigilancia', '2017-12-01', '2017-12-01 16:03:26', 'Ventanilla unica', 4, 'personero', '1', 'VU', 'VU', 'NRP0HF5GB0K6G02BSD7M', 'E', NULL, 'P', '2017-12-02', NULL, NULL, 'A', 'N', 0, 0),
(10, 2017, 2, 127, 'CMC', 'heber.guifo', '2017-12-01', '2017-12-01 16:17:07', 'Ventanilla unica', 4, 'personero', '1', 'VU', 'VU', 'NK4CVLD5TV2AAFSHOONX', 'E', NULL, 'P', '2017-12-02', NULL, NULL, 'A', 'N', 0, 0),
(11, 2017, 6, NULL, 'INR', 'jefe.servicios', '2017-12-01', '2017-12-01 16:27:03', 'alumbrado navideño', 1, 'funserv1', '567', 'alumbrado navideño', 'informe sobre el tema navideño', 'BOPRSQIFUBG7GZ9F4U4Y', 'E', NULL, 'P', '2017-12-02', NULL, NULL, 'A', 'N', 0, 0),
(12, 2017, 3, NULL, 'CAN', 'personero', '2017-12-02', '2017-12-02 10:25:09', 'Musica', 1, 'hector.barragan', '234', 'musica', 'ver documento adjunto', 'RIS4W1HSG1WAWM9H8DAO', 'E', NULL, 'P', '2017-12-03', NULL, NULL, 'A', 'N', 0, 0),
(13, 2017, NULL, 128, 'CIT', 'hector.barragan', '2017-12-05', '2017-12-05 12:59:21', 'fdsdfdf', 1, NULL, '44545', 'cvcvcxvcx', 'vccvxcvcxvc', 'SM000SA2KAKRY96FCUHQ', 'E', NULL, 'W', '2017-12-06', NULL, NULL, 'P', 'N', 0, 0),
(14, 2017, 2, 129, 'CAN', 'jefe.mpublico', '2017-12-06', '2017-12-06 01:20:04', 'fdsdfdf', 22, 'hector.barragan', '344545', 'vcvcxvxcvx', 'wfv', 'DNEBA3FUTATXTP64R86F', 'E', NULL, 'P', '2017-12-07', NULL, NULL, 'A', 'N', 1, 0),
(15, 2017, 4, 130, 'CAN', 'personero', '2017-12-06', '2017-12-06 13:28:15', 'xxxxx', 5, 'hector.barragan', '44545', 'cvcvcxvcx', '54treter', '96E06WIT39LLFOJY8VM7', 'E', NULL, 'P', '2017-12-07', NULL, NULL, 'A', 'N', 0, 0),
(16, 2017, 5, 131, 'ATU', 'personero', '2017-12-06', '2017-12-06 17:14:19', 'vbcvbcv', 3, 'hector.barragan', '44545', 'vcvcxvxcvx', 'trhrthr', 'ND6976QZX3NCFXGUS94L', 'E', NULL, 'P', '2017-12-12', NULL, NULL, '1', 'N', 0, 0),
(17, 2017, 6, 131, 'ATU', 'personero', '2017-12-06', '2017-12-06 17:17:46', 'vbcvbcv', 3, 'hector.barragan', '44545', 'vcvcxvxcvx', 'trhrthr', '4U8A1EK9QP6DDN6BOKY8', 'E', NULL, 'P', '2017-12-12', NULL, NULL, 'A', 'N', 1, 0),
(18, 2017, 7, 131, 'ATU', 'personero', '2017-12-06', '2017-12-06 17:18:07', 'vbcvbcv', 3, 'hector.barragan', '44545', 'vcvcxvxcvx', 'trhrthr', 'JTROLHSJO35AXUT7R5OY', 'E', NULL, 'P', '2017-12-12', NULL, NULL, '1', 'N', 0, 0),
(19, 2017, 8, 132, 'ATU', 'personero', '2017-12-09', '2017-12-09 00:17:43', 'fdsdfdf', 17, 'hector.barragan', '44545', 'cvcvcxvcx', 'dcsdcsdcsdcs', 'TT274ZL1D9AI4JS5XDFO', 'E', NULL, 'P', '2017-12-15', NULL, NULL, 'A', 'N', 1, 0),
(20, 2017, 9, 132, 'ATU', 'personero', '2017-12-09', '2017-12-09 00:19:08', 'fdsdfdf', 17, 'hector.barragan', '44545', 'cvcvcxvcx', 'dcsdcsdcsdcs', 'LTLCM9DGDZAQRY91OZKO', 'E', NULL, 'P', '2017-12-15', NULL, NULL, '1', 'N', 0, 0),
(21, 2017, 10, 132, 'ATU', 'jefe.vigilancia', '2017-12-09', '2017-12-09 00:20:16', 'fdsdfdf', 17, 'hector.barragan', '44545', 'cvcvcxvcx', 'dcsdcsdcsdcs', 'T4R25A6B98B8FXKQJ463', 'E', NULL, 'P', '2017-12-15', NULL, NULL, '1', 'N', 0, 0),
(22, 2017, 11, 133, 'ATU', 'personero', '2017-12-11', '2017-12-10 23:48:03', 'ffdfd', 4, 'hector.barragan', '433434', 'cvcvcxvcx', 'fdf', 'IN31G3CQQLV8GDP1J3XX', 'E', NULL, 'P', '2017-12-17', NULL, NULL, 'A', 'N', 0, 0),
(23, 2017, 12, 133, 'ATU', 'personero', '2017-12-11', '2017-12-10 23:49:26', 'ffdfd', 4, 'hector.barragan', '433434', 'cvcvcxvcx', 'fdf', '5MYXGE2S2TR1N2O3DFLJ', 'E', NULL, 'P', '2017-12-17', NULL, NULL, 'A', 'N', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrsf_ent_aud`
--

CREATE TABLE `pqrsf_ent_aud` (
  `NUM_CON_AUD` int(11) NOT NULL,
  `NUM_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO PQRSF QUE ASIGNA EL SISTEMA',
  `ANIO_PQR` int(11) DEFAULT NULL COMMENT 'A?O DE TRABAJO DEL SISTEMA',
  `NUM_INT_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO DE LA PQRSF POR DEPENDENCIA',
  `NUM_PER` int(11) DEFAULT NULL COMMENT 'NUMERO CONSECUTIVO DE PERSONA. PUEDE SER NATURAL, JURIDICA O ANONIMA. TABLA PERSONA',
  `COD_DOC` varchar(3) DEFAULT NULL COMMENT 'TIPO DE DOCUMENTO DE PQRSF, TIPOS DE PETICIONES. TABLA DOCUMENTO',
  `COD_FUN` varchar(30) DEFAULT NULL COMMENT 'CODIGO UNICO DEL FUNCIONARIO QUIEN TIENE ASIGNADO LA PQRSF. TABLA FUNCIONARIO.',
  `FEC_RAC_PQR` date DEFAULT NULL COMMENT 'FECHA DE RADICACION DE LA PQRSF',
  `HOR_RAC_PQR` datetime DEFAULT NULL COMMENT 'FECHA Y HORA DE RADICACION DE LA PQRSF',
  `ASU_PQR` varchar(200) DEFAULT NULL COMMENT 'ASUNTO DE LA PQRSF',
  `CAN_FOL_PQR` smallint(6) DEFAULT NULL COMMENT 'CANTIDAD DE FOLIOS O HOJAS QUE COMPONEN LA PQRSF',
  `COD_FUN_ENT` int(11) DEFAULT NULL COMMENT 'CODIGO FUNCIONARIO QUIEN RECIBE LA RADICACION. NO ES MODIFICABLE DESDE LA APLICACION',
  `NUM_OFI_ENT` varchar(30) DEFAULT NULL COMMENT 'NUMERO DE OFICIO RECIBIDO CUANDO SE RECIBE UNA COPIA DE UNA PQRSF',
  `OBS_PQR` varchar(300) DEFAULT NULL COMMENT 'OBSERVACIONES ACERCA DEL PQRSF',
  `DES_PQR` varchar(500) DEFAULT NULL COMMENT 'DESCRIPCION DEL CASO PQRSF',
  `NUM_TIC_PQR` varchar(20) DEFAULT NULL COMMENT 'NUMERO DE TICKET ALFANUMERICO DE 20 CARACTERES DE LA PQRSF PARA PODER CONSULTAR Y HACER SEGUIMIENTO AL CASO VIA WEB.',
  `TIPO_COR_ENT` varchar(1) DEFAULT NULL COMMENT 'TIPO DE CORRESPONDENCIA (INTERNA-EXTERNA)',
  `GEN_REP` varchar(1) DEFAULT NULL COMMENT 'GENERACION DE REPORTE ESTO CON EL FIN DE LLEVAR UN CONTROL CUANDO SE GENERA UN REPORTE DE ENTREGA',
  `TIP_PQR_ENT` varchar(1) DEFAULT NULL COMMENT 'TIPO DE PQRSF. W: WEB, P: PRESENCIAL',
  `FEC_MAX_RES` date DEFAULT NULL COMMENT 'FECHA MAXIMA DE RESPUESTA QUE SE CALCULA CON BASE AL TIPO DE DOCUMENTO Y LOS DIAS DEL VENCIMIENTO DEL TERMINO',
  `FEC_ENT_DEP_PQR` date DEFAULT NULL COMMENT 'FECHA DE ENTREGA AL JEFE DE DEPENDENCIA O ASIGNACION AL JEFE DE DEPENDENCIA',
  `FEC_CIE_PQR` date DEFAULT NULL COMMENT 'FECHA DE CIERRE DEL CASO PQRSF',
  `EST_PQR` varchar(1) DEFAULT 'A' COMMENT 'ESTADO DE LA PQRSF',
  `COP_PQR` varchar(1) DEFAULT NULL COMMENT 'INDICA SI ES UNA COPIA DE UNA PETICION O NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LAS PQRSF OFICIALES QUE SE RE';

--
-- Volcado de datos para la tabla `pqrsf_ent_aud`
--

INSERT INTO `pqrsf_ent_aud` (`NUM_CON_AUD`, `NUM_PQR`, `ANIO_PQR`, `NUM_INT_PQR`, `NUM_PER`, `COD_DOC`, `COD_FUN`, `FEC_RAC_PQR`, `HOR_RAC_PQR`, `ASU_PQR`, `CAN_FOL_PQR`, `COD_FUN_ENT`, `NUM_OFI_ENT`, `OBS_PQR`, `DES_PQR`, `NUM_TIC_PQR`, `TIPO_COR_ENT`, `GEN_REP`, `TIP_PQR_ENT`, `FEC_MAX_RES`, `FEC_ENT_DEP_PQR`, `FEC_CIE_PQR`, `EST_PQR`, `COP_PQR`) VALUES
(70, 1, 2015, 1, 118, 'DEP', 'jefe.servicios', '2015-12-26', '2015-12-26 15:26:02', 'Servicios publicos alumbrado', 5, 0, 'A21', 'Muy caro el recibo', 'El recibo me llego caro porque no lo entregaron a tiempo.', 'U8WASSBL2WZYDWDGXNGN', 'E', NULL, 'P', '2016-01-10', NULL, NULL, 'A', 'N'),
(71, 1, 2015, 1, 118, 'DEP', 'funserv1', '2015-12-26', '2015-12-26 15:26:02', 'Servicios publicos alumbrado', 5, 0, 'A21', 'Muy caro el recibo', 'El recibo me llego caro porque no lo entregaron a tiempo.', 'U8WASSBL2WZYDWDGXNGN', 'E', NULL, 'P', '2016-01-10', NULL, NULL, 'A', 'N'),
(72, 21, 2017, 10, 132, 'ATU', 'personero', '2017-12-09', '2017-12-09 00:20:16', 'fdsdfdf', 17, 0, '44545', 'cvcvcxvcx', 'dcsdcsdcsdcs', 'T4R25A6B98B8FXKQJ463', 'E', NULL, 'P', '2017-12-15', NULL, NULL, 'A', 'N'),
(73, 4, 2015, 1, 120, 'ATU', 'personero', '2017-12-01', '2017-12-01 12:57:56', 'exclamacion al montaje de casa', 12, 0, '234234', 'kljahdkljhasdfhklasdf', 'asjdlkfjhaskldfhaklsdhflkajhsdkfhjaksdf', 'C47P0HMRXBED367VZ5A4', 'I', NULL, 'P', '2017-12-07', NULL, NULL, 'A', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrsf_sal`
--

CREATE TABLE `pqrsf_sal` (
  `NUM_PQR_SAL` int(11) NOT NULL,
  `ANIO_PQR_SAL` int(11) NOT NULL,
  `NUM_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO PQRSF QUE ASIGNA EL SISTEMA',
  `ANIO_PQR` int(11) DEFAULT NULL COMMENT 'A?O DE TRABAJO DEL SISTEMA',
  `NUM_INT_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO DE LA PQRSF POR DEPENDENCIA',
  `FEC_OFI_SAL` date DEFAULT NULL COMMENT 'FECHA EN QUE SE GENERA EL OFICIO DE SALIDA',
  `HOR_OFI_SAL` datetime DEFAULT NULL COMMENT 'FECHA Y HORA EN QUE SE GENERA EL OFICIO DE SALIDA',
  `CAN_FOL_SAL` smallint(6) DEFAULT NULL COMMENT 'CANTIDAD DE FOLIOS O HOJAS QUE COMPONEN DEL OFICIO DE SALIDA',
  `DES_OFI_SAL` varchar(500) DEFAULT NULL COMMENT 'DESCRIPCION DEL OFICIO DE SALIDA',
  `ASU_OFI_SAL` varchar(200) DEFAULT NULL COMMENT 'ASUNTO DEL OFICIO DE SALIDA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS OFICIOS DE SALIDA O RESPU';

--
-- Volcado de datos para la tabla `pqrsf_sal`
--

INSERT INTO `pqrsf_sal` (`NUM_PQR_SAL`, `ANIO_PQR_SAL`, `NUM_PQR`, `ANIO_PQR`, `NUM_INT_PQR`, `FEC_OFI_SAL`, `HOR_OFI_SAL`, `CAN_FOL_SAL`, `DES_OFI_SAL`, `ASU_OFI_SAL`) VALUES
(4, 2015, 1, 2015, NULL, '2015-12-25', '2015-12-26 16:46:45', 2, 'Se visito la empresa enertolima y se hizo algo', 'Visita enertolima'),
(5, 2015, 1, 2015, NULL, '2015-12-26', '2015-12-26 16:48:15', 0, 'Algo del oficio', 'Segundo seguimiento'),
(6, 2015, 1, 2015, NULL, '2015-12-26', '2015-12-26 16:54:52', 2, 'Se realiza respuesta de la solicitud del caso', 'Respuesta de la solicitud'),
(7, 2015, 1, 2015, NULL, '2015-12-26', '2015-12-26 17:07:43', 1, 'Se responde al peticionario sobre la situacion  y se anexa el documento.', 'Respuesta al caso'),
(8, 2015, 3, 2015, NULL, '2015-12-28', '2015-12-27 23:23:44', 2, 'Oficio de respuesta numero ABC123', 'Respuesta peticion'),
(9, 2015, 3, 2015, NULL, '2015-12-28', '2015-12-27 23:57:03', 2, 'Oficio de respuesta numero ABC123', 'Respuesta peticion'),
(10, 2015, 3, 2015, NULL, '2015-12-28', '2015-12-28 11:04:15', 10, 'Se realiza oficio de oficio respuesta', 'Respuesta peticion'),
(11, 2017, 4, 2015, NULL, '2017-12-01', '2017-12-01 13:02:04', 6, 'jaskdjhkashfkjshdfkj', ',mnzxc,mnzx,cmn'),
(12, 2017, 5, 2015, NULL, '2017-12-01', '2017-12-01 13:09:55', 4, 'asqwefqfaw', 'sdfsdf'),
(13, 2017, 4, 2017, NULL, '2017-12-01', '2017-12-01 13:48:10', 2, 'sdfgsdfgsdfgsdf', 'sdfsdfsdf'),
(14, 2017, 5, 2017, NULL, '2017-12-01', '2017-12-01 15:01:53', 1, 'kkkkk', 'jui'),
(15, 2017, 5, 2017, NULL, '2017-12-01', '2017-12-01 15:03:15', 1, '1', '1'),
(16, 2017, 4, 2017, NULL, '2017-12-01', '2017-12-01 15:18:24', 1, '1', '11'),
(17, 2017, 5, 2017, NULL, '2017-12-01', '2017-12-01 15:34:35', 2, '2', '22'),
(18, 2017, 5, 2017, NULL, '2017-12-01', '2017-12-01 15:35:09', 3, '3', '3'),
(19, 2017, 4, 2017, NULL, '2017-12-01', '2017-12-01 15:35:52', 7, '7', '7'),
(20, 2017, 6, 2017, NULL, '2017-12-01', '2017-12-01 15:41:05', 1, '9', '9'),
(21, 2017, 6, 2017, NULL, '2017-12-01', '2017-12-01 15:41:37', 2, '8', '8'),
(22, 2017, 7, 2017, NULL, '2017-12-01', '2017-12-01 15:50:31', 6, '6', '6'),
(23, 2017, 4, 2017, NULL, '2017-12-01', '2017-12-01 15:53:04', 3, '3', '3'),
(24, 2017, 8, 2017, NULL, '2017-12-01', '2017-12-01 15:56:25', 3, 'presupuesto de fiestas', 'fiestas'),
(25, 2017, 10, 2017, NULL, '2017-12-01', '2017-12-01 16:18:10', 1, '2', 'EXCELENTE'),
(26, 2017, 11, 2017, NULL, '2017-12-01', '2017-12-01 16:50:09', 1, 'Finalizado', 'Informe entregado'),
(27, 2017, 8, 2017, NULL, '2017-12-02', '2017-12-02 08:18:19', 3, 'Segunda entrega del informe', 'Fiestas'),
(28, 2017, 5, 2017, NULL, '2017-12-02', '2017-12-02 08:21:00', 6, 'akal', 'akhksha'),
(29, 2017, 10, 2017, NULL, '2017-12-02', '2017-12-02 08:21:58', 1, 'ventanilla', 'evalucion'),
(30, 2017, 5, 2017, NULL, '2017-12-02', '2017-12-02 08:22:33', 2, 'anexos', 'anexos'),
(31, 2017, 10, 2017, NULL, '2017-12-02', '2017-12-02 08:23:35', 4, 'saludo', 'hola'),
(32, 2017, 7, 2017, NULL, '2017-12-02', '2017-12-02 09:06:10', 2, 'respuesta', 'respuesta'),
(33, 2017, 14, 2017, NULL, '2017-12-06', '2017-12-06 01:42:33', 3, 'sss', 'ssssss'),
(34, 2017, 15, 2017, NULL, '2017-12-06', '2017-12-06 13:30:21', 7, 'rtrtrtrtrt', 'rtrtr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrsf_sal_cor`
--

CREATE TABLE `pqrsf_sal_cor` (
  `NUM_PQR_SAL` int(11) NOT NULL,
  `ANIO_PQR_SAL` int(11) NOT NULL,
  `NUM_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO PQRSF QUE ASIGNA EL SISTEMA',
  `ANIO_PQR` int(11) DEFAULT NULL COMMENT 'AÑO DE TRABAJO DEL SISTEMA',
  `NUM_INT_PQR` int(11) DEFAULT NULL COMMENT 'NUMERO INTERNO DE LA PQRSF POR DEPENDENCIA',
  `FEC_OFI_SAL` date DEFAULT NULL COMMENT 'FECHA EN QUE SE GENERA EL OFICIO DE SALIDA',
  `HOR_OFI_SAL` datetime DEFAULT NULL COMMENT 'FECHA Y HORA EN QUE SE GENERA EL OFICIO DE SALIDA',
  `CAN_FOL_SAL` smallint(6) DEFAULT NULL COMMENT 'CANTIDAD DE FOLIOS O HOJAS QUE COMPONEN DEL OFICIO DE SALIDA',
  `DES_OFI_SAL` varchar(500) DEFAULT NULL COMMENT 'DESCRIPCION DEL OFICIO DE SALIDA',
  `ASU_OFI_SAL` varchar(200) DEFAULT NULL COMMENT 'ASUNTO DEL OFICIO DE SALIDA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS OFICIOS DE SALIDA O RESPU';

--
-- Volcado de datos para la tabla `pqrsf_sal_cor`
--

INSERT INTO `pqrsf_sal_cor` (`NUM_PQR_SAL`, `ANIO_PQR_SAL`, `NUM_PQR`, `ANIO_PQR`, `NUM_INT_PQR`, `FEC_OFI_SAL`, `HOR_OFI_SAL`, `CAN_FOL_SAL`, `DES_OFI_SAL`, `ASU_OFI_SAL`) VALUES
(2, 2015, 1, 2015, NULL, '2015-12-26', '2015-12-26 17:07:43', 1, 'j kjk jfkdsa jfkdsj kfasd', 'fdjaksdj k'),
(4, 2017, 4, 2017, NULL, '2017-12-01', '2017-12-01 15:35:52', 1, '7', '7'),
(5, 2017, 6, 2017, NULL, '2017-12-01', '2017-12-01 15:41:37', 2, '8', '8'),
(6, 2017, 10, 2017, NULL, '2017-12-02', '2017-12-02 08:21:59', 1, 'ventanilla', 'evalucion'),
(7, 2017, 10, 2017, NULL, '2017-12-02', '2017-12-02 08:23:35', 4, 'saludo', 'hola'),
(8, 2017, 15, 2017, NULL, '2017-12-06', '2017-12-06 13:30:21', 4, 'gffgfgdfg', 'fffff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `COD_ROL` varchar(3) NOT NULL,
  `NOM_ROL` varchar(50) DEFAULT NULL,
  `EST_ROL` varchar(1) DEFAULT NULL COMMENT 'ESTADO DEL ROL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS ROLES DEL SISTEMA';

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`COD_ROL`, `NOM_ROL`, `EST_ROL`) VALUES
('ADM', 'Admin', 'A'),
('CIN', 'Control Interno', 'A'),
('FUN', 'Funcionario', 'A'),
('JDP', 'Jefe de dependencia', 'A'),
('PER', 'Personero', 'A'),
('SEC', 'Secretaria del personero', 'A'),
('VEN', 'Ventanilla unica', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `COD_TIP_DOC` char(3) NOT NULL COMMENT 'CODIGO DEL TIPO DE DOCUMENTO',
  `NOM_TIP_DOC` varchar(100) DEFAULT NULL COMMENT 'NOMBRE DEL TIPO DE DOCUMENTO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS TIPOS DE DOCUMENTO DE LAS';

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`COD_TIP_DOC`, `NOM_TIP_DOC`) VALUES
('CED', 'Cédula de ciudadanía'),
('CEX', 'Cédula de extranjeria'),
('DNI', 'Documento nacional de identificación'),
('TI', 'Tarjeta de identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `COD_TIP_PER` varchar(2) NOT NULL COMMENT 'CODIGO DEL TIPO DE PERSONA',
  `NOM_TIP_PER` varchar(100) DEFAULT NULL COMMENT 'NOMBRE DEL TIPO DE PERSONA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGADA DE ALMACENAR LOS TIPOS DE PERSONAS\r\n\r\n';

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`COD_TIP_PER`, `NOM_TIP_PER`) VALUES
('OT', 'Otros'),
('PJ', 'Persona Juridica'),
('PN', 'Persona Natural');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `COD_FUN` varchar(30) NOT NULL COMMENT 'CODIGO UNICO DEL FUNCIONARIO',
  `COD_ROL` varchar(3) DEFAULT NULL,
  `PAS_USU` varchar(40) DEFAULT NULL COMMENT 'PASSWORD ENCRIPTADO DEL FUNCIONARIO',
  `EST_USU` varchar(1) DEFAULT NULL COMMENT 'ESTADO DEL USUARIO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ENTIDAD ENCARGA DE ALMACENAR LOS USUARIOS DE INGRESO AL SIST';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`COD_FUN`, `COD_ROL`, `PAS_USU`, `EST_USU`) VALUES
('funserv1', 'FUN', 'e3a38c0bab3c502efdd8e77731ea3f13', 'A'),
('funserv2', 'FUN', 'bec8dd074d907b5f183176d34355ac4f', 'A'),
('heber.guifo', 'JDP', 'edcb81666cf02a2fe281f71b00336321', 'A'),
('hector.barragan', 'VEN', '8198f93e1b864f8854944adba2f8db3e', 'A'),
('jefe.mpublico', 'JDP', 'de81aa4b91cecbdfe975cf20125eef60', 'A'),
('jefe.servicios', 'JDP', '1c6a0edfec680066a81f567c312512d2', 'A'),
('jefe.vigilancia', 'JDP', 'cfe4a1448335952545488313e7c3c332', 'A'),
('personero', 'PER', 'a987dda10fbf55269b503ca7367db090', 'A'),
('sadmin', 'ADM', '97e6f512a7ed6d22a7d7ef9e7db8ee40', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`NUM_ALE`),
  ADD KEY `FK_DOCUMENTO_ALERTA` (`COD_DOC`);

--
-- Indices de la tabla `anexo_pqrsf_ent`
--
ALTER TABLE `anexo_pqrsf_ent`
  ADD PRIMARY KEY (`NUM_ANE`),
  ADD KEY `FK_PQRSF_ENT_ANEXO` (`NUM_PQR`,`ANIO_PQR`);

--
-- Indices de la tabla `anexo_pqrsf_sal`
--
ALTER TABLE `anexo_pqrsf_sal`
  ADD PRIMARY KEY (`NUM_ANE_SAL`),
  ADD KEY `FK_PQRSF_SAL_ANEXO` (`NUM_PQR_SAL`,`ANIO_PQR_SAL`);

--
-- Indices de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD PRIMARY KEY (`COD_DEP`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`COD_DOC`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`COD_FUN`),
  ADD KEY `FK_DEPENDENCIA_FUNCIONARIO` (`COD_DEP`);

--
-- Indices de la tabla `log_cron_job`
--
ALTER TABLE `log_cron_job`
  ADD PRIMARY KEY (`NUM_CRON`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`COD_MEN`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`PATH_PAG`),
  ADD KEY `FK_MENU_PAGINA` (`COD_MEN`);

--
-- Indices de la tabla `pagina_rol`
--
ALTER TABLE `pagina_rol`
  ADD PRIMARY KEY (`COD_ROL`,`PATH_PAG`),
  ADD KEY `FK_PAGINA_X_ROL_2` (`PATH_PAG`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`COD_PAR`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`NUM_PER`),
  ADD KEY `FK_TIPO_DOCUMENTO` (`COD_TIP_DOC`),
  ADD KEY `FK_TIPO_PERSONA` (`COD_TIP_PER`);

--
-- Indices de la tabla `persona_telefono`
--
ALTER TABLE `persona_telefono`
  ADD PRIMARY KEY (`NUM_PER`,`NUM_TEL_PER`);

--
-- Indices de la tabla `pqrsf_ent`
--
ALTER TABLE `pqrsf_ent`
  ADD PRIMARY KEY (`NUM_PQR`,`ANIO_PQR`),
  ADD KEY `FK_DOCUMENTO_PQRSF_ENT` (`COD_DOC`),
  ADD KEY `FK_FUNCIONARIO_PQRSF` (`COD_FUN`),
  ADD KEY `FK_PERSONA_PQRSF_ENT` (`NUM_PER`);

--
-- Indices de la tabla `pqrsf_ent_aud`
--
ALTER TABLE `pqrsf_ent_aud`
  ADD PRIMARY KEY (`NUM_CON_AUD`);

--
-- Indices de la tabla `pqrsf_sal`
--
ALTER TABLE `pqrsf_sal`
  ADD PRIMARY KEY (`NUM_PQR_SAL`,`ANIO_PQR_SAL`),
  ADD KEY `FK_PQRSF_SALIDA` (`NUM_PQR`,`ANIO_PQR`);

--
-- Indices de la tabla `pqrsf_sal_cor`
--
ALTER TABLE `pqrsf_sal_cor`
  ADD PRIMARY KEY (`NUM_PQR_SAL`,`ANIO_PQR_SAL`),
  ADD KEY `FK_PQRSF_SALIDA_FK` (`NUM_PQR`,`ANIO_PQR`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`COD_ROL`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`COD_TIP_DOC`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`COD_TIP_PER`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_FUN`),
  ADD KEY `FK_ROL_USUARIO` (`COD_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `NUM_ALE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'NUMERO CONSECUTIVO DE LA ALERTA';
--
-- AUTO_INCREMENT de la tabla `anexo_pqrsf_ent`
--
ALTER TABLE `anexo_pqrsf_ent`
  MODIFY `NUM_ANE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'NUMERO CONSECUTIVO DEL ANEXO ASIGNADO POR EL SISTEMA', AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT de la tabla `anexo_pqrsf_sal`
--
ALTER TABLE `anexo_pqrsf_sal`
  MODIFY `NUM_ANE_SAL` int(11) NOT NULL AUTO_INCREMENT COMMENT 'NUMERO CONSECUTIVO DEL ANEXO ASIGNADO POR EL SISTEMA', AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `log_cron_job`
--
ALTER TABLE `log_cron_job`
  MODIFY `NUM_CRON` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `NUM_PER` int(11) NOT NULL AUTO_INCREMENT COMMENT 'NUMERO CONSECUTIVO DE PERSONA ASIGNADO POR EL SISTEMA', AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT de la tabla `pqrsf_ent_aud`
--
ALTER TABLE `pqrsf_ent_aud`
  MODIFY `NUM_CON_AUD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `FK_DOCUMENTO_ALERTA` FOREIGN KEY (`COD_DOC`) REFERENCES `documento` (`COD_DOC`);

--
-- Filtros para la tabla `anexo_pqrsf_ent`
--
ALTER TABLE `anexo_pqrsf_ent`
  ADD CONSTRAINT `FK_PQRSF_ENT_ANEXO` FOREIGN KEY (`NUM_PQR`,`ANIO_PQR`) REFERENCES `pqrsf_ent` (`NUM_PQR`, `ANIO_PQR`);

--
-- Filtros para la tabla `anexo_pqrsf_sal`
--
ALTER TABLE `anexo_pqrsf_sal`
  ADD CONSTRAINT `FK_PQRSF_SAL_ANEXO` FOREIGN KEY (`NUM_PQR_SAL`,`ANIO_PQR_SAL`) REFERENCES `pqrsf_sal` (`NUM_PQR_SAL`, `ANIO_PQR_SAL`);

--
-- Filtros para la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `FK_DEPENDENCIA_FUNCIONARIO` FOREIGN KEY (`COD_DEP`) REFERENCES `dependencia` (`COD_DEP`);

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `FK_MENU_PAGINA` FOREIGN KEY (`COD_MEN`) REFERENCES `menu` (`COD_MEN`);

--
-- Filtros para la tabla `pagina_rol`
--
ALTER TABLE `pagina_rol`
  ADD CONSTRAINT `FK_PAGINA_X_ROL` FOREIGN KEY (`COD_ROL`) REFERENCES `rol` (`COD_ROL`),
  ADD CONSTRAINT `FK_PAGINA_X_ROL_2` FOREIGN KEY (`PATH_PAG`) REFERENCES `pagina` (`PATH_PAG`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `FK_TIPO_DOCUMENTO` FOREIGN KEY (`COD_TIP_DOC`) REFERENCES `tipo_documento` (`COD_TIP_DOC`),
  ADD CONSTRAINT `FK_TIPO_PERSONA` FOREIGN KEY (`COD_TIP_PER`) REFERENCES `tipo_persona` (`COD_TIP_PER`);

--
-- Filtros para la tabla `persona_telefono`
--
ALTER TABLE `persona_telefono`
  ADD CONSTRAINT `FK_PERSONA_TELEFONO` FOREIGN KEY (`NUM_PER`) REFERENCES `persona` (`NUM_PER`);

--
-- Filtros para la tabla `pqrsf_ent`
--
ALTER TABLE `pqrsf_ent`
  ADD CONSTRAINT `FK_DOCUMENTO_PQRSF_ENT` FOREIGN KEY (`COD_DOC`) REFERENCES `documento` (`COD_DOC`),
  ADD CONSTRAINT `FK_FUNCIONARIO_PQRSF` FOREIGN KEY (`COD_FUN`) REFERENCES `funcionario` (`COD_FUN`),
  ADD CONSTRAINT `FK_PERSONA_PQRSF_ENT` FOREIGN KEY (`NUM_PER`) REFERENCES `persona` (`NUM_PER`);

--
-- Filtros para la tabla `pqrsf_sal`
--
ALTER TABLE `pqrsf_sal`
  ADD CONSTRAINT `FK_PQRSF_SALIDA` FOREIGN KEY (`NUM_PQR`,`ANIO_PQR`) REFERENCES `pqrsf_ent` (`NUM_PQR`, `ANIO_PQR`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_FUNCIONARIO_USUARIO` FOREIGN KEY (`COD_FUN`) REFERENCES `funcionario` (`COD_FUN`),
  ADD CONSTRAINT `FK_ROL_USUARIO` FOREIGN KEY (`COD_ROL`) REFERENCES `rol` (`COD_ROL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
