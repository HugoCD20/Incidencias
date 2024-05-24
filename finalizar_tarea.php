<?php
session_start();



    $id_tecnico=$_SESSION["id"];
    $id_tarea=$_POST["id_tarea"];
    $id_incidencia=$_POST["id_incidencia"];


    $query = "SELECT * FROM tareas WHERE id_tarea = :id_tecnico";

        $consulta = $conexion->prepare($query);
        $consulta->bindParam(':id_tecnico', $id_tarea, PDO::PARAM_INT);
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos = json_decode($registro['tarea'], true);
                $datos = [
                    "titulo" => $datos["titulo"],
                    "descripcion" => $datos["descripcion"],
                    "Estado"=>"finalizado";
                ];
                $datos=json_encode($datos);
                include('conexion.php');

                $query = "UPDATE tareas SET tarea=:tarea where id_tarea=:id_tarea";

                $consulta = $conexion->prepare($query);
                $consulta->bindParam(':id_incidencia', $id_incidencia);
                $consulta->bindParam(':tarea', $datos);
                $consulta->bindParam(':id_tecnico', $id_tecnico);
                $consulta->execute();
                header("location: tecnico.php");
            }
        }

  



    
?>