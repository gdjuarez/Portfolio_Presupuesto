<?php
include("../conex/conexion.php");
if(isset($_GET['id'])) {
  $id = $_GET['id'];
 // echo ($id);
  $query = "DELETE FROM proveedor WHERE codProveedor = $id";
  $result = mysqli_query($miConexion, $query);
  if(!$result) {
       die(" No se puede Eliminar el PROVEEDOR:  $id  posee transacciones a su nombre");
  }
  echo '<script language=javascript>
          alert("Proveedor Borrado")
          self.location = "proveedores.php"</script>';

  //header('Location: proveedores.php');
}
?>