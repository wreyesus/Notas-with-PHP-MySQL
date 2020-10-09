<?php
//link para la conexion con la BD
$link = 'mysql:host=localhost; dbname=yt_colores';
//Credenciales (las encuentras en localhost/MAMP/)
$user = 'root';
$password = 'root';

try {
    //Funcion PDO que recibe 3 parametros, el link de la conexion, usuario y password
	$pdo = new PDO($link, $user, $password);



} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
