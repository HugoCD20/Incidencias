<?php
session_start();
$accion=$_POST["accion"];
if($accion=="cancelar"){
    header("location: tecnico.php");
    exit();
}

$id_tecnico=$_SESSION["id"];
    $id_incidencia=$_POST["id_incidencia"];
    $titulo=$_POST["titulo"];
    $descripcion=$_POST["descripcion"];
    
    $datos = [
        "titulo" => $titulo,
        "descripcion" => $descripcion,
        "Estado"=>"activo";
    ];


    $datos=json_encode($datos);
    include('conexion.php');

    $query = "INSERT INTO tareas(id_incidencia,tarea,id_tecnico)  VALUES (:id_incidencia,:datos,:id_tecnico)";

    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':id_incidencia', $id_incidencia);
    $consulta->bindParam(':datos', $datos);
    $consulta->bindParam(':id_tecnico', $id_tecnico);
    $consulta->execute();
    header("location: tecnico.php");
?>