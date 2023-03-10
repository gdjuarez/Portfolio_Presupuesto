<?php
session_start();
if ($_SESSION['logged'] == 'yes') {
	//echo 'Usuario: '.$_SESSION['user'];
} else {
	echo 'No te has logeado, inicia sesion.';
	header("Location: ../index.php"); /* Redirección del navegador */
}
?>
<?php
// Include database connection
include("../conex/conexion.php");
?>
<!--DATAGRID -->
<?php

// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Argentina/Buenos_Aires');

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<!-- popover contacto -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<title>Menu</title>

	<link rel="stylesheet" href="../stylefondoMadera.css">
	<style>
		/* Changes an element's color on hover */
		.list-group-item {
			background-color: white;
		}

		.list-group-item:hover {
			background-color: grey;
			color: white;
		}
	</style>
</head>

<body>
	<!-- popover contacto -->
	<script>
		$(document).ready(function() {
			$('[data-toggle="popover"]').popover();
		});
	</script>

	<header class="sticky-top">
		<div class='container bg-primary rounded'>
			<nav class="navbar navbar-light bg-primary">
				<!-- Navbar content -->
				<form action="#" method="POST">
					<input name="Enviar" type="submit" value="usuario: <?php echo $_SESSION['user'] ?> " class="btn btn-dark" />
				</form>
				<a href="#" class="navbar-brand">
					<h2>M E N U</h2>
				</a>
				<form action="../destruir.php" method="POST" class="form-inline">
					<button class="btn btn-dark sm" type="submit">cerrar-sesion</button>
				</form>
			</nav>
		</div>
	</header>



	<div class="container bg-light">

		<div class="row">
			<div class="col-md-4 bg-primary border rounded">
				<h5 class="text-white">Presupuesto</h5>
				<div class="list-group p-2">
					<a href="../presupuesto/nuevopresupuesto/nuevop.php" class="list-group-item list-group-item-action list-group-item-success">Nuevo Presupuesto</a>
					<a href="../presupuesto/buscadorpresupuesto.php" class="list-group-item list-group-item-action">Buscar Presupuesto</a>
					<a href="../presupuesto/listadop.php" class="list-group-item list-group-item-action">Listado de Presupuesto</a>
					<a href="../presupuesto/panular.php" class="list-group-item list-group-item-action">Anular Presupuesto</a>
				</div>
			</div>

			<div class="col-md-4 border rounded bg-primary">
				<h5 class="text-white">Entregas</h5>
				<div class="list-group p-2">
					<a href="../presupuesto/buscadorpresupendiente.php" class="list-group-item list-group-item-action">Presupuestos Pendientes</a>
					<a href="../stock/StockManager.php" class="list-group-item list-group-item-action">Stock Manager</a>
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>
					<a href="../articulos/articulos.php" class="list-group-item list-group-item-action">Articulos</a>
				</div>
			</div>

			<div class="col-md-4 border rounded bg-primary">
				<h5 class="text-white">Ingreso</h5>
				<div class="list-group p-2">
					<a href="../ingreso/nuevoingreso/nuevo.php" class="list-group-item list-group-item-action">Nuevo Ingreso</a>
					<a href="../ingreso/listadoingresos.php" class="list-group-item list-group-item-action">Listar</a>
					<a href="#" class="list-group-item list-group-item-action text-white">.</a>
					<a href="../precios/precioManager.php" class="list-group-item list-group-item-action">Actualizar Precios</a>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-4 border rounded bg-primary">
				<h5 class="text-white">Clientes</h5>
				<div class="list-group p-2">
					<a href="../clientes/clientes.php" class="list-group-item list-group-item-action">Clientes</a>

				</div>
			</div>

			<div class="col-md-4 border rounded bg-primary">
				<h5 class="text-white">Proveedores</h5>
				<div class="list-group p-2">
					<a href="../proveedores/proveedores.php" class="list-group-item list-group-item-action">Proveedores</a>
				</div>
			</div>

			<div class="col-md-4 border rounded bg-primary">
				<h5 class="text-white">Usuarios</h5>
				<div class="list-group p-2">
					<a href="../usuarios/registroUsuarios.php" class="list-group-item list-group-item-action">Usuarios</a>
				</div>
			</div>

		</div>
		<br>
		<footer class='bg-white border rounded'>
			<small>&copy; Copyright 2021 -
			
				<a href="#" data-toggle="popover" title="Contacto Programador" data-content=" Juarez Gustavo <br /> 2324- 15 505930  " data-html = "true">Contacto</a>
		
			</small>
		</footer>

	</div>

	<!-- Option 1: Bootstrap Bundle (includes Popper) -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>