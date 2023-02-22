<?php
	require_once('../conex/conexion.php');
	//sleep(1);
	$search = '';
	if (isset($_POST['search'])){
		$search = strtolower($_POST['search']);
	}
	$resultado = mysqli_query ($miConexion,"SELECT * FROM proveedor WHERE Apellido LIKE '%".$search."%'  or RazonSocial LIKE '%".$search."%' or codProveedor LIKE '%".$search."%' order by Apellido ASC");
	$total = mysqli_num_rows($resultado);
?>
	<table class="table table-striped">
       	<thead>
       		<tr>
           		<th>Cuil</th>
           		<th>Apellido</th>
				<th>Nombre</th>
				<th>Razon Social</th>
				<th>Domicilio</th>
           		<th>Telefono fijo</th>
           		<th>Telefono celular</th>
           		<th>Mail</th>
           		<th>Accion</th>
      		</tr>
       	</thead>
   	<tbody>
<?php if ($total>0 && $search!='') {

while($row = mysqli_fetch_assoc($resultado)) { ?>
	<tr>
   		<td><?php echo $row['codProveedor']; ?></td>
   		<td><?php echo $row['Apellido']; ?></td>
		<td><?php echo $row['Nombre']; ?></td>
		<td><?php echo $row['RazonSocial']; ?></td>
		<td><?php echo $row['Domicilio']; ?></td>
		<td><?php echo $row['TelFijo']; ?></td>
   		<td><?php echo $row['TelCelular']; ?></td>
   		<td><?php echo $row['Email']; ?></td>
  		<td>
   			<div class="btn-group">
   				<a href="edit.php?id=<?php echo $row['codProveedor']?>" class="btn btn-secondary" ><i class="fas fa-marker"></i> </a>
   				<a href="delete.php?id=<?php echo $row['codProveedor']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> </a>
			</div>
   		</td>
	</tr>
<?php
    }
?>

<?php
echo "Resultados de la búsqueda:".$total.""; //total de filas de la tabla
?>
<?php }
elseif($total>0 && $search=='') echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>