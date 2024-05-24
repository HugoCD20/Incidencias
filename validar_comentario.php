<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "Sesión no iniciada.";
    exit;
}

$id_tecnico = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $condicion = $_POST['comentario'];
    
    if ($condicion == 'cancelar') {
        header("Location: tecnico.php");
        exit;
    } else {
        $id_incidencia = $_POST['id_incidencia'];
        $mensaje = $_POST['mensaje'];
        $fecha = date("Y-m-d H:i:s");

        echo $id_incidencia;
        echo $mensaje . "\n";
        echo $fecha . "\n";

        include('conexion.php');

        $query = "INSERT INTO mensajes (id_incidencia, id_tecnico, mensaje, fecha) VALUES (:id_incidencia, :id_tecnico, :mensaje, :fecha)";
        $consulta = $conexion->prepare($query);

        $consulta->bindParam(':id_incidencia', $id_incidencia, PDO::PARAM_INT);
        $consulta->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);
        $consulta->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        $consulta->bindParam(':fecha', $fecha, PDO::PARAM_STR);

        if ($consulta->execute()) {
            echo "Mensaje insertado correctamente.";
            header("Location: tecnico.php");
        } else {
            echo "Error al insertar el mensaje.";
        }
    }
} else {
    echo "Acceso no permitido.";
}
?>