<?php
session_start();


include('conexion.php');

    $id_tecnico=$_SESSION["id"];
    $id_tarea=$_POST["accion"];
    $id_incidencia=$_POST["id_incidencia"];


    $query = "SELECT * FROM tareas WHERE id_tarea = :id_tecnico";

        $consulta = $conexion->prepare($query);
        $consulta->bindParam(':id_tecnico', $id_tarea, PDO::PARAM_INT);
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos = json_decode($registro['tarea'], true);
                $datos2 = [
                    "titulo" => $datos["titulo"],
                    "descripcion" => $datos["descripcion"],
                    "Estado"=>"finalizado"
                ];
                $datos3=json_encode($datos2);

                $query = "UPDATE tareas SET tarea=:tarea where id_tarea=:id_tarea";

                $consulta = $conexion->prepare($query);
                $consulta->bindParam(':tarea', $datos3);
                $consulta->bindParam(':id_tarea', $id_tarea);
                $consulta->execute();
                header("location: tecnico.php");
            }
        }

  



    
?>