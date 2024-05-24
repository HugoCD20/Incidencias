<?php
    session_start();
    
    
    echo $_SESSION['id'];
    $titulo=$_POST["titulo"];
    $descripcion=$_POST["descripcion"];
    $evidencias=$_POST["evidencias"];

    $datos = [
        "titulo" => $titulo,
        "evidencias" => $descripcion,
        "etapa_actual"=>$evidencias
    ];


    $datos=json_encode($datos);
    include('conexion.php');

    $query = "INSERT INTO incidencias(id_trabajador,incidencia)  VALUES (:id_trabajador,:datos)";

    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':id_trabajador', $_SESSION['id']);
    $consulta->bindParam(':datos', $datos);
    $consulta->execute();
    header("location: home.php");


    exit();
    
     
?>