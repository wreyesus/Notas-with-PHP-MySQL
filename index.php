<?php

//Para consumir un archivo que queremos
include_once 'conexion.php';

//Apuntar a las filas de la tabla colores
$table_colors = 'SELECT * FROM colores';

//Preparacion del contenido para luego ser mostrado
$get_allColors = $pdo->prepare($table_colors);
$get_allColors->execute();

//Obtener todos las filas de la tabla colores
//Se crea una variable, luego se ejecuta la funcion de la conexion a la BD
//Y se le indica que se quiere obtener
$result = $get_allColors->fetchAll();
echo ('<pre></pre>');
var_dump($result);

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
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
