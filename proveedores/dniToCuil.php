<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dni a Cuil</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--FavIcon-->
  	<link rel="shortcut icon" href="../img/yo.png" type="image/png" />
    <!-- BOOTSTRAP 4
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css"> -->
    <!-- 0  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css.css">

</head>
<body>
    <main class="container p-4">
	    <div id="estilo" ; class="card card-body"; >
            <div id='titulobuscador' class="text-center"><h4>Transforma DNI a CUIL: </h4></div>
            <div> . </div>
            <div class="row justify-content-center">
	            <div class="row text-center">
                    <div class="column=4">
                        <label for="usr"> Dni:</label>
                        <div class="col">
                            <input type="text" class="form-control" id="dni">
                        </div>
                    </div>
                </div>
                <div class="column=4">
                    <label for="sel1">   Selecione genero:</label>
                    <div class="col">
                        <select class="form-control" id="sel1">
                            <option>HOMBRE</option>
                            <option>MUJER</option>
                            <option>SOCIEDAD</option>
                        </select>
                    </div>
                </div>
            </div>
            <div> . </div>
            <div class="row justify-content-center">
                <div class="row text-center">
                    <div class="column =4">
                        <label for="usr">Cuil:</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id = "cuil" name= "cuil" placeholder="Aqui verá su Cuil..." disabled >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div> . </div>
            <div class="row justify-content-center">
                <div class="row text-center">
                    <div class="column =4">
                        <button type="button" title="Convierte el DNI a CUIL" class="btn btn-info btn-responsive center-block" id = "boton_aceptar">Aceptar</button>
                        <!--este boton lleva de vuelta el valor de cuil, a clientes.php y cierra este formulario!-->
                        <button type="button" title="Volver" class="btn btn-info btn-responsive center-block" id = "boton_lientes" href="Clientes.php">Volver</button>
                    </div>
                </div>
            </div>
            <script src="getCuil.js"></script>
        </div>
    </main>
</body>
</html>