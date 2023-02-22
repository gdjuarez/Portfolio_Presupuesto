
<link rel="stylesheet" href="css.css">

<?php
include("../conex/conexion.php");
//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);
$codCliente = $_GET['id'];
//echo '<script> alert (" El n°:  '.$codCliente.' cliente ");</script>';
if  (isset($_GET['id'])) {
  $codCliente = $_GET['id'];
  $query = "SELECT * FROM cliente WHERE codCliente =$codCliente";
 // echo '<script> alert ('.$query.');</script>';
  $result = mysqli_query($miConexion, $query);
  if ($result) {
    $row = mysqli_fetch_array($result);
    $codCliente = $row['codCliente'];
    $apellido = $row['Apellido'];
    $nombre = $row['Nombre'];
    $RazonSocial = $row['RazonSocial'];
    $domicilio = $row['Domicilio'];
    $telefonoFijo = $row['TelFijo'];
    $telefonoCelular = $row['TelCelular'];
    $Ciudad = $row['Ciudad'];
    $CP = $row['CodigoPostal'];
    $Provincia = $row['Provincia'];
    $Email = $row['Email'];
 }
}
if (isset($_POST['update'])) {
  $codCliente = $_POST['codCliente'];
  $apellido =$_POST['Apellido'];
  $nombre = $_POST['Nombre'];
  $RazonSocial = $_POST['RazonSocial'];
  $domicilio = $_POST['Domicilio'];
  $telefonoFijo = $_POST['TelefonoFijo'];
  $telefonoCelular = $_POST['TelefonoCelular'];
  $Ciudad = $_POST['Ciudad'];
  $CP = $_POST['CP'];
  $Provincia = $_POST['Provincia'];
  $Email = $_POST['Email'];
  //echo '<script>alert (" El codigo n°:  '.$codCliente.' clientes ");</script>';
 $actualizar=mysqli_query($miConexion,'UPDATE cliente SET Apellido ="'.mysqli_real_escape_string($miConexion,$apellido).
      '",Nombre="'.$nombre.
      '",RazonSocial="'.$RazonSocial.
      '",Domicilio="'.$domicilio.
      '",TelFijo="'.$telefonoFijo.
      '",TelCelular="'.$telefonoCelular.
      '",Ciudad="'.$Ciudad.
      '",CodigoPostal="'.$CP.
      '",Provincia="'.$Provincia.
      '",Email="'.$Email.
      '" where codCliente ="'.mysqli_real_escape_string($miConexion,$codCliente).'"')
      or die("error consulta: ".mysqli_error($miConexion));

     echo '<script language=javascript>
          alert("ACTUALIZADO")
          self.location = "clientes.php"</script>';
/*header('Location: clientes.php');*/
}
?>
<!doctype html>
<html lang="en">
  <head>
  <title>editar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
     integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
	   <!-- fontawesome css -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   <link rel="stylesheet" href="../stylefondoMadera.css">
        
    </head>
  <body>
    <header class="sticky-top">
      <div class="container">
          <nav class="navbar navbar-light bg-primary">
              <form action="../clientes/clientes.php" method="POST">
              <input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
          </form>
              <a class="navbar-brand" href="#">Editar Cliente</a>
              <form action= "../destruir.php" method="POST"  class="form-inline">
              <button class="btn btn-dark" type="submit">usuario: <?php echo $_SESSION['user']?> <br>cerrar-sesion</button>
            </form>
          </nav>
  </header>

<div id = "Edit" class="container " >
  <div id="estilo"  class="card card-body"; >
    <form action="edit.php" method="POST">
      <div class="form-row">
        <div class="col-6">
          <p>Codigo Cliente ( CIUL/CUIT ):<input type="text" name="codCliente" class="form-control" value="<?php echo $codCliente?>" readonly ></p>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <p>Apellido:<input type="text" name="Apellido"  class="form-control" value="<?php echo $apellido?>" autofocus ></p>
        </div>
        <div class="col">
          <p>Nombre:<input type="text" name="Nombre" class="form-control" value="<?php echo $nombre?>" ></p>
        </div>
        <div class="col">
          <p>Razon Social:<input type="text" name="RazonSocial" class="form-control" value="<?php echo $RazonSocial?>" ></p>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
  				<p>Domicilio:<input type="text" name="Domicilio"  class="form-control" value="<?php echo $domicilio?>" ></p>
  			</div>
   			<div class="col">
					<p>Telefono Fijo:<input type="text" name="TelefonoFijo"  class="form-control" value="<?php echo $telefonoFijo?>"></p>
   			</div>
   			<div class="col">
					<p>Telefono Celular:<input type="text" name="TelefonoCelular" class="form-control" value="<?php echo $telefonoCelular?>" ></p>
   			</div>
			</div>
		  <div class="form-row">
   			<div class="col">
					<p>Ciudad:<input type="text" name="Ciudad"  class="form-control" value="<?php echo $Ciudad?>"></p>
   			</div>
   			<div class="col">
					<p>Cod. Postal:<input type="text" name="CP" class="form-control" value="<?php echo $CP?>" ></p>
   			</div>
   			<div class="col">
					<p>Provincia:<input type="text" name="Provincia" class="form-control" value="<?php echo $Provincia?>" ></p>
   			</div>
			</div>
      <p>E-Mail:<input type="text" name="Email" class="form-control" value="<?php echo $Email?>" ></p>
      <button class="btn btn-info" name="update">Actualizar</button>
    </form>
  </div>
</div>

	<!-- Option 1: Bootstrap Bundle (includes Popper) -->  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>