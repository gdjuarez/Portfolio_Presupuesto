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

include("../conex/conexion.php");

//NO MUESTRA ERROR al cargar
error_reporting(error_reporting() & ~E_NOTICE);

?>
<!doctype html>
<html lang="en">

<head>
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
    <title>Proveedores</title>
    <!-- jquery -->
    <script src="js/jquery.js"></script>
    <!--JS personalizado -->
    <script src="scriptproveedor.js"></script>
 
    <!--css personalizado -->
    <link rel="stylesheet" href="css.css">

    <script>
        $(function() {
            $('#search_form').submit(function(e) {
                e.preventDefault();
            })
            $('#search').keyup(function() {
                var search = $('#search').val();
                $('#seleccion').val(search); //copia texto para imrimir seleccion

                $('#resultados').html(
                    '<h3><img src="../img/loading.gif" width="20" alt="" /> Cargando</h3>');
                $.ajax({
                    type: 'POST',
                    url: 'buscadorProveedores.php',
                    data: {
                        search
                    },
                    success: function(resp) {
                        if (resp != "") {
                            $('#resultados').html(resp);
                        }
                    }
                })
            })
        })
    </script>
</head>

<body>
    <header class="sticky-top">
        <div class="container bg-primary rounded">
            <!--Navegador!-->
            <nav class="navbar navbar-light ">
                <form action="../menu/menu.php" method="POST">
                    <input name="Enviar" type="submit" value="volver" class="btn btn-dark" />
                </form>
                <a class="navbar-brand" href="#">Gestion de Proveedores</a>
                <form action="../destruir.php" method="POST" class="form-inline">
                    <button class="btn btn-dark" type="submit">usuario: <?php echo $_SESSION['user'] ?>
                        <br>cerrar-sesion</button>
                </form>
            </nav>
        </div>
    </header>
    <div class="container bg-light rounded">
        <div id="buscadorCuil">
            <!--Buscador de CUIL!-->
            <div id="estilo" ; class="card card-body" ;>
                <div id='titulobuscador' class="text-center">
                    <h4>Transforma DNI a CUIL: </h4>
                </div>
                <div id="enlinea">
                    <div id="DivDNI">
                        <label for="usr"> Dni:</label>
                        <input type="text" class="form-control" id="dni">
                    </div>

                    <div id="DivGenero">
                        <label for="sel1"> Selecione genero:</label>
                        <select class="form-control" id="sel1">
                            <option>HOMBRE</option>
                            <option>MUJER</option>
                            <option>SOCIEDAD</option>
                        </select>
                    </div>

                    <div id="DivCuil">
                        <label for="usr">Cuil:</label>
                        <input type="text" class="form-control" id="cuil" name="cuil" placeholder="Aqui verá su Cuil..." disabled>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="row text-center">
                        <div class="column =4">
                            <button type="button" title="Convierte el DNI a CUIL" class="btn btn-info btn-responsive center-block" id="boton_aceptar">Aceptar</button>
                            <button type="button" title="Volver" class="btn btn-info btn-responsive center-block" id="ocultar">Volver</button>
                        </div>
                    </div>
                </div>
                <script src="getCuil.js"></script>
            </div>
        </div>
    </div>


    <main class="container p-1 bg-light">
        <!--ABM!-->
        <div id="estilo" ; class="card card-body" ;>
            <div class="text-center">
                <form action="save.php" method="POST">
                    <div class="form-row">
                        <div class="col-6">
                            <p>Codigo Proveedor( Cuil/Cuit ):<input type="text" name="codProveedor" id="codProveedor" class="form-control" value="<?php echo $codProveedor ?>" maxlength="11" required></p>
                        </div>
                        <div class="col-6">
                            <button type="button" title="Convierte el DNI a CUIL/CUIT" class="btn btn-info btn-responsive center-block" id="mostrar">DNI a CUIL</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <p>Apellido: <input type="text" name="Apellido" class="form-control" value="<?php echo $Apellido ?>"></p>
                        </div>
                        <div class="col">
                            <p>Nombre: <input type="text" name="Nombre" class="form-control" value="<?php echo $Nombre ?>"></p>
                        </div>
                        <div class="col">
                            <p>Razon Social: <input type="text" name="RazonSocial" class="form-control" value="<?php echo $RazonSocial ?>"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <p>Domicilio: <input type="text" name="Domicilio" class="form-control" value="<?php echo $Domicilio ?>"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <p>Telefono Fijo: <input type="text" name="TelefonoFijo" class="form-control" value="<?php echo $TelefonoFijo ?>"></p>
                        </div>
                        <div class="col">
                            <p>Telefono Celular: <input type="text" name="TelefonoCelular" class="form-control" value="<?php echo $TelefonoCelular ?>"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <p>Ciudad: <input type="text" name="Ciudad" class="form-control" value="<?php echo $Ciudad ?>"></p>
                        </div>
                        <div class="col">
                            <p>CP: <input type="text" name="CP" class="form-control" value="<?php echo $CP ?>"></p>
                        </div>
                        <div class="col">
                            <p>Provincia: <input type="text" name="Provincia" class="form-control" value="<?php echo $Provincia ?>"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <p>E-Mail: <input type="text" name="Email" class="form-control" value="<?php echo $Email ?>">
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" value="Guardar" class="btn btn-primary mb-2" title="Registrar nuevo proveedor" />
                    </div>
                </form>
            </div>
        </div>
    </main>

    <main class="container p-1 bg-light rounded">
        <!--Busqueda e imprimir!-->
        <div id="estilo" ; class="card card-body" ;>
            <div class="col-md-12">
                <hr>
                <div id='titulobuscador'>
                    <h3>Buscador de proveedores: </h3>
                </div>
                <div id="buscador">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post" name="search_form" id="search_form">
                                <input title="Ingrese proveedor" type="text" name="search" id="search" placeholder="Ingrese proveedor">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right ">
                                <div class="btn-group">
                                    <form action="printPDFProveedoresSeleccion.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=900, height=900')">
                                        <input type="text" name="seleccion" id="seleccion" hidden>
                                        <input title="Imprime seleccion" type="submit" value="Imprimir Seleccion" class="btn btn-secondary m-2" />
                                    </form>
                                    <form action="printPDFProveedoresTodos.php" method="POST" target="ventanaForm" onsubmit="window.open('', 'ventanaForm', 'width=900, height=900')">
                                        <input title="Imprime todo" type="submit" name="imprimirA" value="Imprimir todo" class="btn btn-secondary m-2" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="resultados"></div>
                <hr>
            </div>
        </div>
    </main>
    <!-- Option 1: Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>