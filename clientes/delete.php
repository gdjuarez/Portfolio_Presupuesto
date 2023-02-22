<?php
include("../conex/conexion.php");
if(isset($_GET['id'])) {
  $id = $_GET['id'];
 // echo ($id);
  $query = "DELETE FROM cliente WHERE codCliente = $id";
  $result = mysqli_query($miConexion, $query);
  if(!$result) {
       die(" No se puede Eliminar el CLIENTE:  $id  posee transacciones a su nombre");
  }
  echo '<script language=javascript>
          alert("Cliente Borrado")
          self.location = "clientes.php"</script>';

  //header('Location: clientes.php');
}
?>