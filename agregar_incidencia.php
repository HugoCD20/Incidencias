<?php
    session_start();
    
    
    echo $_SESSION['id'];
    $id=$_SESSION['id'];
    $titulo=$_POST["titulo"];
    $descripcion=$_POST["descripcion"];
    $evidencias=$_POST["evidencias"];

    $datos = [
        "titulo" => $titulo,
        "descripcion" => $descripcion,
        "evidencias"=>$evidencias,
        "etapa_actual"=>1
    ];


    $datos=json_encode($datos);
    include('conexion.php');

    $query = "INSERT INTO incidencias(id_trabajador,incidencia)  VALUES (:id_trabajador,:datos)";

    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':id_trabajador', $id);
    $consulta->bindParam(':datos', $datos);
    $consulta->execute();
    header("location: home.php");


    exit();
    
     
?>