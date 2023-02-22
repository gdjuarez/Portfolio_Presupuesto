<?php
	require_once('../conex/conexion.php');
	//sleep(1);
	$search = '';
	//if (isset($_POST['search'])){
	//	$search = strtolower($_POST['search']);
	//}
	$resultado = mysqli_query ($miConexion,"SELECT * FROM marcaarticulo ");
	$total = mysqli_num_rows($resultado);
?>

	<table class="table table-striped">
	    <thead>
	    	<tr>	        	           
	            <th>Marca</th> 
	        </tr>
	    </thead>
	<tbody>

<?php if ($total>0 ) {

while($row = mysqli_fetch_assoc($resultado)) { ?>
	<tr>
	    <td><?php echo $row['Marca']; ?></td>
	    <td>
	        <div class="btn-group" hidden>
	            <a href="deletemarca.php?id=<?php echo $row['Marca']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> </a>
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
elseif($total>0 ) echo '<h3>Ingresa un parámetro de búsqueda</h3>';
else echo '<h2>No se han encontrado resultados</h2>';
?>