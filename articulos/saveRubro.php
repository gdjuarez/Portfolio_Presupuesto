<?php
include('../conex/conexion.php');
//Recibir
$Rubro = strip_tags($_POST['rubro']);
$prefijo = $_POST['prefijo'];

//echo $Rubro;
//echo $prefijo;


//verifico que no este VACIO 
if ((isset($_POST['rubro']) && empty($_POST['rubro'])) || (isset($_POST['prefijo']) && $prefijo=="NaN")) {

      echo '<script language=javascript>
          alert("Prefijo invalido")
          self.location = "rubro.php"</script>';
}else{

      $consulta = 'select prefijo from contador_articulos where prefijo="'.$prefijo.'" ';
      //echo $consulta;
      $buscar = mysqli_query($miConexion, $consulta);

      foreach ($buscar as $cabecera):  
            $pre=$cabecera['prefijo'];
           // echo $pre;
      endforeach;
      

      if ($pre==''){
           // echo 'no existe';

      $sql = 'INSERT INTO rubroarticulo (Rubro) values ("' . $Rubro . '")';

      $grabar = mysqli_query($miConexion, $sql);

      $sql2 = 'INSERT INTO contador_articulos (prefijo,numeral) values ("' . $prefijo . '","0000")';

      $grabar2 = mysqli_query($miConexion, $sql2);
          
      }else{
          echo '<script language=javascript>
          alert("Prefijo: YA existe!!")
            self.location = "rubro.php"</script>';
           // echo 'ya existe';
      }
      
      if ($grabar) {
            echo '<script language=javascript>
      alert("Rubro registrado.")
      self.location = "rubro.php"</script>';
            // header('Location: marca.php');
      } else {
            echo '<script language=javascript>
      alert("Hubo un error en el registro rubroarticulo")
      self.location = "rubro.php"</script>';
      }
      

}
 

?>