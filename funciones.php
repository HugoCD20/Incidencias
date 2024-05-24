

<?php

function detalles($id_incidencia){
    include("conexion.php");
        $query="SELECT * FROM incidencias where id_incidencia=:id_incidencia";
        $consulta=$conexion->prepare($query);
        $consulta->bindParam(':id_incidencia', $id_incidencia);
        $consulta->execute();
        $datos2 = "";
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos = json_decode($registro['incidencia'], true);
                if($datos["etapa_actual"]!="1"){
                    $etapa="Asignada";
                }else{
                    $etapa="No Asignada";
                }
                $datos2=$etapa;
                        
                
            }
        }
    return $datos2;
}
function ConsultarTrabajador($id_trabajador){
    include("conexion.php");
    $query="SELECT* FROM trabajadores WHERE id_trabajador=:id";
    $consulta=$conexion->prepare($query);
    $consulta->bindParam(':id',$id_trabajador);
    $consulta->execute();
    $datos2="";
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos = json_decode($registro['trabajador'], true);
                $datos2=$datos["nombre"];
            }
        }
        return $datos2;
    }
function ConsultarAsignacion($id_asignacion){
    include("conexion.php");
    $query="SELECT* FROM asignacion WHERE id_asignacion=:id_asignacion";
    $consulta=$conexion->prepare($query);
    $consulta->bindParam(':id_asignacion',$id_asignacion);
    $consulta->execute();
    $datos2 = "";
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos2 = $registro["id_tecnico"];
            }
        }
    return $datos2;
}
function ConsultarIncidencia($id_incidencia){
    include("conexion.php");
        $query="SELECT * FROM incidencias where id_incidencia=:id_incidencia";
        $consulta=$conexion->prepare($query);
        $consulta->bindParam(':id_incidencia', $id_incidencia);
        $consulta->execute();
        $datos = [];
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos = json_decode($registro['incidencia'], true);
                
            }
             }
    return $datos;
}
function Consultarmensajes($id_incidencia){
    include("conexion.php");
    $query2="SELECT * FROM mensajes where id_incidencia=:id_incidencia";
    $consulta2=$conexion->prepare($query2);
    $consulta2->bindParam(':id_incidencia', $id_incidencia);
    $consulta2->execute();
    $datos=detalles($id_incidencia);
    echo "<div class='form-group1'>
            <div class='form-group2'>
                <label for='Nombre'>Estado:</label>
                </div>
                    <div class='form-group2'>
                    <label for='Nombre'>".$datos."</label>
                </div>
        </div>s
        <div class='form-group'>
                <label for='Apellido'>Comentarios</label>
        </div>";

        
    if ($consulta2->rowCount() > 0) {
        while ($registro2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
            $id_incidencia=$registro2["id_mensaje"];
            $datos=ConsultarTrabajador($registro2["id_tecnico"]);
       echo "<div class='cuadro'>
            <div class='form-group'>
                    <label for='nombretec'>Tecnico: ".$datos."</label>
                </div>
            <div class='form-group'>
                    <label for='Comentarios'>". $registro2["mensaje"]."</label>
            </div>
            <div class='form-group0'>
                <p>".$registro2["fecha"]."</p>
            </div></div><br>";
            
        }
    }
}

function ActualizarEtapa($id_incidencia){
    include('conexion.php');
    $datos2=ConsultarIncidencia($id_incidencia);
    $datos = [
        "titulo" => $datos2["titulo"],
        "descripcion" => $datos2["descripcion"],
        "evidencias"=>$datos2["evidencias"],
        "etapa_actual"=>2
    ];
    $datos=json_encode($datos);
    $query = "UPDATE incidencias set incidencia=:etapa where id_incidencia=:id_incidencia";
    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':id_incidencia', $id_incidencia);
    $consulta->bindParam(':etapa', $datos);
    $consulta->execute();
}
?>