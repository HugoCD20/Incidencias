<?php
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$Contraseña= hash('sha256', $_POST["Contraseña"]);
$rol=$_POST["rol"];
$datos = [
    "nombre" => $nombre,
    "apellido" => $apellido,
    "contrasena" => $Contraseña,
    "rol"=>$rol
];
$datos=json_encode($datos);
include('conexion.php');
$query = "INSERT INTO trabajadores(trabajador) 
VALUES (:datos)";
$consulta = $conexion->prepare($query);
$consulta->bindParam(':datos', $datos);
$consulta->execute();
header("location: home.php");
?>