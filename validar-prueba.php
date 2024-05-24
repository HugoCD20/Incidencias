<?php
session_start();
include("funciones.php");
    $id_incidencia=$_POST["id_incidencia"];
    $id_tecnico=$_SESSION["id"];
    $id_mensaje=$_POST["resultado"];
    $fecha = date("Y-m-d H:i:s");

    include('conexion.php');

        $query = "INSERT INTO mensajes (id_incidencia, id_tecnico, mensaje, fecha) VALUES (:id_incidencia, :id_tecnico, :mensaje, :fecha)";
        $consulta = $conexion->prepare($query);

        $consulta->bindParam(':id_incidencia', $id_incidencia, PDO::PARAM_INT);
        $consulta->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);
        $consulta->bindParam(':mensaje', $id_mensaje, PDO::PARAM_STR);
        $consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);

        if (!$consulta->execute()) {
            echo "Mensaje insertado correctamente.";
            header("Location: tecnico.php");
        } 
        ActualizarEtapa2($id_incidencia);
    function ActualizarEtapa2($id_incidencia){
        include('conexion.php');
        $datos2=ConsultarIncidencia($id_incidencia);
        $datos = [
            "titulo" => $datos2["titulo"],
            "descripcion" => $datos2["descripcion"],
            "evidencias"=>$datos2["evidencias"],
            "etapa_actual"=>"5"
        ];
        echo $datos2["titulo"];
        $datos=json_encode($datos);
        $query = "UPDATE incidencias set incidencia=:etapa where id_incidencia=:id_incidencia";
        $consulta = $conexion->prepare($query);
        $consulta->bindParam(':id_incidencia', $id_incidencia);
        $consulta->bindParam(':etapa', $datos);
        $consulta->execute();
       header("location: tecnico.php");
    }


?>