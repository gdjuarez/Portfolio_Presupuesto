<?php

include('../conex/conexion.php');

//Recibir datos del form
$codCliente = strip_tags($_POST['codCliente']);
$Apellido = strip_tags($_POST['Apellido']);
$Nombre = strip_tags($_POST['Nombre']);
$RazonSocial = strip_tags($_POST['RazonSocial']);
$Domicilio = strip_tags($_POST['Domicilio']);
$TelefonoFijo = strip_tags($_POST['TelefonoFijo']);
$TelefonoCelular = strip_tags($_POST['TelefonoCelular']);
$Email = strip_tags($_POST['Email']);
$Ciudad = strip_tags($_POST['Ciudad']);
$CodigoPostal = strip_tags($_POST['CP']);
$Provincia = strip_tags($_POST['Provincia']);

//verifico que no este VACIO el campo usuario
    if((isset($_POST['codCliente']) && empty($_POST['codCliente']))&&
      (isset($_POST['Apellido']) && empty($_POST['Apellido'])) &&
      (isset($_POST['Nombre']) && empty($_POST['Nombre'])) &&
      (isset($_POST['Domicilio']) && empty($_POST['Domicilio'])) &&
      (isset($_POST['TelefonoFijo']) && empty($_POST['TelefonoFijo'])) &&
      (isset($_POST['TelefonoCelular']) && empty($_POST['TelefonoCelular'])) &&
      (isset($_POST['Email']) && empty($_POST['Email']))
      ){

      echo '<script language=javascript>
          alert("Los datos son obligatorios")
          self.location = "clientes.php"</script>';

    }else{

      $query = mysqli_query($miConexion,'SELECT * FROM cliente WHERE codCliente="'.mysqli_real_escape_string($miConexion,$codCliente).'"');
      if($existe = mysqli_fetch_object($query))
    {
      //echo 'El usuario '.$user.' ya existe.';
      echo '<script language=javascript>
          alert("Existe un cliente con ese codigo de cuil/cuit")
          self.location = "clientes.php"</script>';

    }else{
      //codCliente  Apellido  Nombre  RazonSocial Dni Cuil  Domicilio TelFijo TelCelular  Email Ciudad  CodigoPostal  Provincia

      $sql= 'INSERT INTO cliente (codCliente, Apellido, Nombre, RazonSocial, Domicilio, TelFijo, TelCelular, Email, Ciudad, CodigoPostal, Provincia ) values ("'.mysqli_real_escape_string($miConexion,$codCliente).'", "'.mysqli_real_escape_string($miConexion,$Apellido).
      '", "'.mysqli_real_escape_string($miConexion,$Nombre).'", "'.mysqli_real_escape_string($miConexion,$RazonSocial).'", "'.mysqli_real_escape_string($miConexion,$Domicilio).
      '", "'.mysqli_real_escape_string($miConexion,$TelefonoFijo).'", "'.mysqli_real_escape_string($miConexion,$TelefonoCelular).'","'.mysqli_real_escape_string($miConexion,$Email).'", "'.mysqli_real_escape_string($miConexion,$Ciudad).'","'.mysqli_real_escape_string($miConexion,$CodigoPostal).'","'.mysqli_real_escape_string($miConexion,$Provincia).'")';

     //echo '<script>alert (" Cliente n°:  '.$sql.'");</script>';

         $grabar = mysqli_query($miConexion,$sql);

      if($grabar)
     {
        echo '<script language=javascript>
            alert("Cliente registrado.")
            self.location = "clientes.php"</script>';

          header('Location: clientes.php');
      }else{
        echo '<script language=javascript>
            alert("Hubo un error en el registro")
           self.location = "clientes.php"</script>';
      }
     }

  }
?>
