<?php //este es para la conexion con el servidor
$servidor = "localhost";
$usuario = "root";
$password = "";
$conexion = new PDO("mysql:host=$servidor;dbname=incidencias", $usuario, $password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>