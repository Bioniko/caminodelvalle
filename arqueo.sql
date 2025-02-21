-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2025 a las 18:44:19
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arqueo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `ID` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `Accion` varchar(256) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_fija`
--

CREATE TABLE `caja_fija` (
  `ID` int(11) NOT NULL,
  `Valor` double(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caja_fija`
--

INSERT INTO `caja_fija` (`ID`, `Valor`) VALUES
(1, 3000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_total`
--

CREATE TABLE `caja_total` (
  `ID` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Total_Caja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajeros`
--

CREATE TABLE `cajeros` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Celular` int(20) NOT NULL,
  `Identidad` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cajeros`
--

INSERT INTO `cajeros` (`ID`, `Nombre`, `Apellido`, `Celular`, `Identidad`) VALUES
(1, 'Rosa', 'Rodriguez', 33595929, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto_venta`
--

CREATE TABLE `gasto_venta` (
  `ID` int(11) NOT NULL,
  `Valor` double(16,2) NOT NULL,
  `Descripcion` varchar(1024) NOT NULL,
  `Foto` varchar(1024) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `ID_Gasto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_venta`
--

CREATE TABLE `ingreso_venta` (
  `ID` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_Tipo_Ingreso` int(11) NOT NULL,
  `Valor` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ID` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `Producto` varchar(256) NOT NULL,
  `Cantidad` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `Usuario` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Tipo` varchar(10) NOT NULL,
  `Estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `ID_Sucursal`, `ID_Cajero`, `Usuario`, `Password`, `Tipo`, `Estado`) VALUES
(2, 4, 1, 'rosa', '2978c7a28003f9e7a9d9536adc6fb880', 'Admin', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE `moneda` (
  `ID` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `1lemp` int(11) NOT NULL,
  `2lemp` int(11) NOT NULL,
  `5lemp` int(11) NOT NULL,
  `10lemp` int(11) NOT NULL,
  `20lemp` int(11) NOT NULL,
  `50lemp` int(11) NOT NULL,
  `100lemp` int(11) NOT NULL,
  `200lemp` int(11) NOT NULL,
  `500lemp` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Bac` double(16,2) NOT NULL DEFAULT 0.00,
  `Promerica` double(16,2) NOT NULL DEFAULT 0.00,
  `Banpais` double(16,2) NOT NULL DEFAULT 0.00,
  `Transferencia` double(16,2) NOT NULL DEFAULT 0.00,
  `Cheque` double(16,2) NOT NULL DEFAULT 0.00,
  `Devoluciones` double(16,2) NOT NULL DEFAULT 0.00,
  `Hugo` double(16,2) NOT NULL DEFAULT 0.00,
  `Pedidos_Ya` double(16,2) NOT NULL DEFAULT 0.00,
  `Distegu` double(16,2) NOT NULL DEFAULT 0.00,
  `Ocho` double(16,2) NOT NULL,
  `Deliverys` double(16,2) NOT NULL,
  `HugoBusiness` double(16,2) NOT NULL,
  `Speedy` double(16,2) NOT NULL,
  `Empleados` double(16,2) NOT NULL,
  `FamiliadelValle` double(16,2) NOT NULL,
  `TotalDia` double(16,2) NOT NULL DEFAULT 0.00,
  `Efectivo` double(16,2) NOT NULL,
  `Caja_Fija` double(16,2) NOT NULL,
  `Otro` double(16,2) NOT NULL DEFAULT 0.00,
  `Descripcion` varchar(5000) NOT NULL,
  `DescripcionInv` varchar(5000) NOT NULL,
  `DescripcionDep` varchar(5000) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Celular2` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID`, `Nombre`, `Celular`, `Celular2`) VALUES
(4, 'Sucursal 1', '98448855', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gasto`
--

CREATE TABLE `tipo_gasto` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_gasto`
--

INSERT INTO `tipo_gasto` (`ID`, `Nombre`) VALUES
(1, 'Compras y Gastos'),
(2, 'Pago Envio'),
(3, 'Tarjeta'),
(4, 'Transferencia'),
(5, 'Cheque'),
(6, 'Al Crédito'),
(7, 'Adelanto de Salario'),
(8, 'Devoluciones'),
(9, 'Nota de Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ingreso`
--

CREATE TABLE `tipo_ingreso` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ingreso`
--

INSERT INTO `tipo_ingreso` (`ID`, `Nombre`, `Tipo`) VALUES
(1, 'Efectivo', 'Contado'),
(2, 'BAC', 'Contado'),
(3, 'Promérica', 'Contado'),
(4, 'Banpaís', 'Contado'),
(5, 'Transferencia', 'Contado'),
(6, 'Cheque', 'Contado'),
(7, 'Devoluciones', 'Contado'),
(8, 'Hugo', 'Crédito'),
(9, 'Pedidos Ya', 'Crédito'),
(10, 'Distegu', 'Crédito'),
(11, 'Ocho', 'Crédito'),
(12, 'Deliverys', 'Crédito'),
(13, 'Hugo Business', 'Crédito'),
(14, 'Speedy', 'Crédito'),
(15, 'Empleados', 'Crédito'),
(16, 'Familia del Valle', 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_gasto`
--

CREATE TABLE `total_gasto` (
  `ID` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `ID_Tipo_Gasto` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ID_Sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_venta`
--

CREATE TABLE `total_venta` (
  `ID` int(11) NOT NULL,
  `ID_Cajero` int(11) NOT NULL,
  `ID_Arqueo` int(11) NOT NULL,
  `ID_Sucursal` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `caja_fija`
--
ALTER TABLE `caja_fija`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `caja_total`
--
ALTER TABLE `caja_total`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cajeros`
--
ALTER TABLE `cajeros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `gasto_venta`
--
ALTER TABLE `gasto_venta`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ingreso_venta`
--
ALTER TABLE `ingreso_venta`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tipo_gasto`
--
ALTER TABLE `tipo_gasto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `total_gasto`
--
ALTER TABLE `total_gasto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `total_venta`
--
ALTER TABLE `total_venta`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja_fija`
--
ALTER TABLE `caja_fija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `caja_total`
--
ALTER TABLE `caja_total`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajeros`
--
ALTER TABLE `cajeros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `gasto_venta`
--
ALTER TABLE `gasto_venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_venta`
--
ALTER TABLE `ingreso_venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_gasto`
--
ALTER TABLE `tipo_gasto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `total_gasto`
--
ALTER TABLE `total_gasto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `total_venta`
--
ALTER TABLE `total_venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
