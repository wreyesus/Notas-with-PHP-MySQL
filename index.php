<?php

//Para consumir un archivo que queremos
include_once 'conexion.php';

//**********LEER ***********/
//Apuntar a las filas de la tabla colores
$sql_leer = 'SELECT * FROM colores';

//Preparacion del contenido para luego ser mostrado
$get_allColors = $pdo->prepare($sql_leer);
$get_allColors->execute();

//Obtener todos las filas de la tabla colores
//Se crea una variable, luego se ejecuta la funcion de la conexion a la BD
//Y se le indica que se quiere obtener
$result = $get_allColors->fetchAll();
echo ('<pre></pre>');

//*********** AGREGAR *********/
//Metodo POST
if($_POST) {
	//Guardar en una variable lo enviado mediante POST por el input 'color'
	$color =  $_POST['color'];

	//Guardar en una variable lo enviado mediante POST por el input 'descripcion'
	$descripcion = $_POST['descripcion'];


	//Metodo agregar, luego seleccionas la tabla (para hacerle referencia) y despues los campos
	//Para finalizar se coloca los valores a agregar, los ? son para mayor seguridad
	$sql_agregar = 'INSERT INTO colores (color, descripcion) VALUES (?,?)';

	//Preparamos para enviar
	$add = $pdo->prepare($sql_agregar);
	$add->execute([$color, $descripcion]);

	header('location:index.php');

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
		<div class="row">
			<div class="col-md-6">
				<?php
				//Los : indica que no se ha cerrado el foreach
					foreach ($result as $color): ?>
				<div class="alert alert-<?php echo $color['color']?>" role="alert">
						<?php echo $color['color'] ?>
						<?php echo $color['descripcion'] ?>
				</div>
				
				<!-- Se cierra el foreach colocando un endforeach -->
				<?php endforeach ?>
			</div>
			
			<div class="col-md-6">
				<h2>Agregar elementos</h2>
					<form method="POST">
					<input type="text" class="form-control mt-3" name="color">
					<input type="text" class="form-control mt-3" name="descripcion">
					<button class="btn btn-primary mt-3">Agregar</button>
					</form>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
