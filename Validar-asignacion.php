<?php
    include("funciones.php");
    $id_incidencia=$_POST["id_incidencia"];
    $id_trabajador=$_POST["mensaje"];

    include('conexion.php');
    $query = "INSERT INTO asignacion(id_incidencia,id_tecnico) 
    VALUES (:id_incidencia,:id_trabajador)";
    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':id_incidencia', $id_incidencia);
    $consulta->bindParam(':id_trabajador', $id_trabajador);
    $consulta->execute();
    ActualizarEtapa($id_incidencia);
    header("location: home.php");
?>