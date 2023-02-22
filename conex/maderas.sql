-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-12-2022 a las 17:50:44
-- Versión del servidor: 10.5.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u345632271_maderas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` varchar(13) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `PrecioCompra` decimal(10,2) NOT NULL,
  `PrecioVenta` decimal(10,2) NOT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Rubro` varchar(45) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `codCaja` int(10) UNSIGNED NOT NULL,
  `codMovCaja` int(10) UNSIGNED NOT NULL,
  `Fecha` date NOT NULL,
  `operador` varchar(45) NOT NULL,
  `saldoinicial` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajamov`
--

CREATE TABLE `cajamov` (
  `idCajaMov` int(10) UNSIGNED NOT NULL,
  `tipoMovimiento` varchar(45) NOT NULL,
  `Descripcion` varchar(120) NOT NULL,
  `tipoComprobante` varchar(45) NOT NULL,
  `serienumero` varchar(45) DEFAULT NULL,
  `ingreso` decimal(10,2) NOT NULL,
  `egreso` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` varchar(11) NOT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `Domicilio` varchar(45) DEFAULT NULL,
  `TelFijo` varchar(45) DEFAULT NULL,
  `TelCelular` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `CodigoPostal` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Estructura de tabla para la tabla `compraarticulos`
--

CREATE TABLE `compraarticulos` (
  `idca` int(10) UNSIGNED NOT NULL,
  `idCompra` int(10) UNSIGNED NOT NULL,
  `idArticulo` varchar(13) NOT NULL,
  `Cantidad` decimal(10,2) UNSIGNED NOT NULL,
  `PrecioUnitario` decimal(10,2) NOT NULL,
  `Importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(10) UNSIGNED NOT NULL,
  `codProveedor` varchar(11) NOT NULL,
  `RazonSocial` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador_articulos`
--

CREATE TABLE `contador_articulos` (
  `id` int(11) NOT NULL,
  `prefijo` varchar(3) NOT NULL,
  `numeral` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contador_articulos`
--


--
-- Estructura de tabla para la tabla `facturae`
--

CREATE TABLE `facturae` (
  `indice` int(11) NOT NULL,
  `ptovta` varchar(5) NOT NULL,
  `nufactura` varchar(45) NOT NULL,
  `CAE` varchar(15) NOT NULL,
  `fechavto` date NOT NULL,
  `codbarra` varchar(40) NOT NULL,
  `Tipocbte` int(3) NOT NULL,
  `Concepto` int(3) NOT NULL,
  `DocTipo` int(3) NOT NULL,
  `DocNro` bigint(11) NOT NULL,
  `CbteFch` date NOT NULL,
  `ImpNeto` decimal(10,2) NOT NULL,
  `ImpTotConc` decimal(10,2) NOT NULL,
  `ImpIVA` decimal(10,2) NOT NULL,
  `ImpTrib` decimal(10,2) NOT NULL,
  `ImpOpEx` decimal(10,2) NOT NULL,
  `ImpTotal` decimal(10,2) NOT NULL,
  `FchServDesde` date NOT NULL,
  `FchServHasta` date NOT NULL,
  `CAsocTipo` int(3) NOT NULL,
  `CAsocPtoVta` varchar(6) NOT NULL,
  `CAsocNro` varchar(45) NOT NULL,
  `TribId` int(3) NOT NULL,
  `TribDesc` varchar(25) NOT NULL,
  `TribBaseImp` decimal(10,2) NOT NULL,
  `TriAlic` decimal(10,2) NOT NULL,
  `TriImporte` decimal(10,2) NOT NULL,
  `CondIVAcliente` int(3) NOT NULL,
  `CondVenta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaedetalle`
--

CREATE TABLE `facturaedetalle` (
  `iddetalle` int(11) NOT NULL,
  `ptovta` varchar(5) NOT NULL,
  `nufactura` int(11) NOT NULL,
  `Tipocbte` int(3) NOT NULL,
  `Producto` varchar(13) NOT NULL,
  `PrecioUnitario` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcaarticulo`
--

CREATE TABLE `marcaarticulo` (
  `Marca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcaarticulo`
--


--
-- Estructura de tabla para la tabla `misdatos`
--

CREATE TABLE `misdatos` (
  `RazonSocial` varchar(45) NOT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Cuit` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `numero` int(11) NOT NULL,
  `cliente` varchar(11) CHARACTER SET utf8 NOT NULL,
  `RazonSocial` varchar(60) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codProveedor` varchar(11) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `RazonSocial` varchar(45) NOT NULL,
  `Domicilio` varchar(45) NOT NULL,
  `TelFijo` varchar(45) NOT NULL,
  `TelCelular` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `CodigoPostal` varchar(45) NOT NULL,
  `Provincia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
-

--
-- Estructura de tabla para la tabla `rubroarticulo`
--

CREATE TABLE `rubroarticulo` (
  `Rubro` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rubroarticulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockarticulos`
--

CREATE TABLE `stockarticulos` (
  `idArticulo` varchar(13) NOT NULL,
  `Stock` int(10) UNSIGNED NOT NULL,
  `StockMinimo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stockarticulos`

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--


--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`codCaja`,`codMovCaja`) USING BTREE,
  ADD KEY `FK_caja_1Mov` (`codMovCaja`);

--
-- Indices de la tabla `cajamov`
--
ALTER TABLE `cajamov`
  ADD PRIMARY KEY (`idCajaMov`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`);

--
-- Indices de la tabla `compraarticulos`
--
ALTER TABLE `compraarticulos`
  ADD PRIMARY KEY (`idca`,`idCompra`) USING BTREE,
  ADD KEY `FK_compra_articulo_1` (`idArticulo`),
  ADD KEY `FK_compra_articulo_2` (`idCompra`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `FK_compras_1Articulo` (`Fecha`) USING BTREE,
  ADD KEY `codProveedor` (`codProveedor`);

--
-- Indices de la tabla `contador_articulos`
--
ALTER TABLE `contador_articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturae`
--
ALTER TABLE `facturae`
  ADD PRIMARY KEY (`indice`);

--
-- Indices de la tabla `facturaedetalle`
--
ALTER TABLE `facturaedetalle`
  ADD PRIMARY KEY (`iddetalle`);

--
-- Indices de la tabla `marcaarticulo`
--
ALTER TABLE `marcaarticulo`
  ADD PRIMARY KEY (`Marca`);

--
-- Indices de la tabla `misdatos`
--
ALTER TABLE `misdatos`
  ADD PRIMARY KEY (`RazonSocial`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `presupuestodetalle`
--
ALTER TABLE `presupuestodetalle`
  ADD PRIMARY KEY (`idp`,`presupuesto`),
  ADD KEY `pedido` (`presupuesto`),
  ADD KEY `producto` (`articulo`),
  ADD KEY `articulo` (`articulo`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codProveedor`);

--
-- Indices de la tabla `rubroarticulo`
--
ALTER TABLE `rubroarticulo`
  ADD PRIMARY KEY (`Rubro`);

--
-- Indices de la tabla `stockarticulos`
--
ALTER TABLE `stockarticulos`
  ADD PRIMARY KEY (`idArticulo`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `codCaja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajamov`
--
ALTER TABLE `cajamov`
  MODIFY `idCajaMov` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compraarticulos`
--
ALTER TABLE `compraarticulos`
  MODIFY `idca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `contador_articulos`
--
ALTER TABLE `contador_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `facturae`
--
ALTER TABLE `facturae`
  MODIFY `indice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturaedetalle`
--
ALTER TABLE `facturaedetalle`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3846;

--
-- AUTO_INCREMENT de la tabla `presupuestodetalle`
--
ALTER TABLE `presupuestodetalle`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12582;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `FK_caja_1Mov` FOREIGN KEY (`codMovCaja`) REFERENCES `cajamov` (`idCajaMov`);

--
-- Filtros para la tabla `compraarticulos`
--
ALTER TABLE `compraarticulos`
  ADD CONSTRAINT `FK_compra_articulo_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`),
  ADD CONSTRAINT `FK_compra_articulo_2` FOREIGN KEY (`idCompra`) REFERENCES `compras` (`idCompra`);

--
-- Filtros para la tabla `presupuestodetalle`
--
ALTER TABLE `presupuestodetalle`
  ADD CONSTRAINT `presupuestodetalle_ibfk_1` FOREIGN KEY (`articulo`) REFERENCES `articulo` (`idArticulo`),
  ADD CONSTRAINT `presupuestodetalle_ibfk_2` FOREIGN KEY (`presupuesto`) REFERENCES `presupuesto` (`numero`);

--
-- Filtros para la tabla `stockarticulos`
--
ALTER TABLE `stockarticulos`
  ADD CONSTRAINT `FK_stockarticulos_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
