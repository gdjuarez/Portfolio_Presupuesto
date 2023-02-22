<?php
session_start();
if($_SESSION['logged'] == 'yes')
{
	//echo 'Usuario: '.$_SESSION['user'];

}else{

	echo '<script language=javascript>
		  alert("No te has logeado, inicia sesion")
		  self.location = "index.html"</script>';
}
?>
<?php
// Include database connection
include("../conex/conexion.php");
?>
<!--DATAGRID -->
<?php
// consulta a la tabla usuarios
$sql = mysqli_query($miConexion,"SELECT *  FROM proveedor order by Apellido");
// cantidad de registros
$cantidad_registros = mysqli_num_rows($sql);
// creo la table y el encabezado
$dyn_table='<table id="Tabla" class="table table-striped">';
    $dyn_table.="<td>" . "codigo" ."</td>";
		$dyn_table.="<td>" . "Apellido " ."</td>";
		$dyn_table.="<td>" . "Nombre ". "</td>";
		$dyn_table.="<td>" . "Dni" ."</td>";
		$dyn_table.="<td>" . "Cuil" ."</td>";
		$dyn_table.="<td>" . "Domicilio ". "</td>";
		$dyn_table.="<td>" . "TelefonoFijo ". "</td>";
		$dyn_table.="<td>" . "TelefonoCelular ". "</td>";
		$dyn_table.="<td>" . "Mail ". "</td>";
//lleno dinamicamente la table
while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
  $idc = $row["codProveedor"];
  $capellido = $row["Apellido"];
	$cnombre = $row["Nombre"];
	$cdni = $row["Dni"];
	$ccuil = $row["Cuil"];
  $cdomicilio = $row["Domicilio"];
	$ctelefonoF = $row["TelefonoFijo"];
	$ctelefonoC = $row["TelefonoCelular"];
	$cmail = $row["Mail"];
	$dyn_table.="<tr>";
    $dyn_table.="<td>" ."<input type='submit' name='caja' class='btn btn-info btn-block' value='".$idc."'/>"."</td>";
	$dyn_table.="<td>" . $capellido ."</td>";
	$dyn_table.="<td>" . $cnombre ."</td>";
	$dyn_table.="<td>" . $cdni."</td>";
	$dyn_table.="<td>" . $ccuil."</td>";
	$dyn_table.="<td>" . $cdomicilio."</td>";
	$dyn_table.="<td>" . $ctelefonoF ."</td>";
	$dyn_table.="<td>" . $ctelefonoC ."</td>";
	$dyn_table.="<td>" . $cmail ."</td>";
}
 $dyn_table.="</tr></table>";
?>
<!--FIN DATAGRID -->


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Proveedores</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!--FavIcon-->
  <link rel="shortcut icon" href="../img/yo.png" type="image/png" />
</head>
	<body>
		<header>
	 <div class='container'>
			<nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->
  		<form action="../menu/menu.php" method="POST">
		    <input name="Enviar" type="submit" value="volver al menu" class="btn btn-warning btn-block" />
		 </form>
  <a href="#" class="navbar-brand"><h2>Listado de Proveedores</h2></a>
    <form action= "../destruir.php" method="POST"  class="form-inline">
       <button class="btn btn-outline-danger sm" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
  	</form>

</nav>

</header>
		<div class='container'>
			<div class='row align-items-center'>
				<div class="col-md-1">  </div>
				<div class="col-md-10">
				 		<form action="frmproveedores.php" method="POST">
							<?php
							echo $dyn_table;
							echo "<p align='center'> Cant. de registros: ".$cantidad_registros."</p>";
							?>
					   </form>
				</div>
				<div class="col-md-1">  </div>
			</div>
		</div>
		<div class='container'>
			<div class='row'>
				<div class="col-md-1"> 	</div>
				<div class="col-md-10">
					<div class="Imprimir p-2">
					   <form action="printPDFProveedores.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=800, height=900')"  >
					  	  <div class="Imprimir p-4"><button id='imprimir' class='btn btn-secondary btn-block'><img src="../img/printer.png">-Imprimir</button></div>
				 		</form>
				 	</div>
				 	<div id="volver">
				  		<form action="frmproveedores.php" method="POST">
					      <input name="Enviar" type="submit" value="volver" class="btn btn-warning btn-block" />
					   	</form>
					</div>
				</div>
				<div class="col-md-1"> </div>
		</div>
	</div>
	</body>
</html>