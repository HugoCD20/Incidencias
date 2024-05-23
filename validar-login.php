<?php
$usuario=$_POST["usuario"];
$contraseña = hash('sha256', $_POST["contraseña"]);
$query="SELECT* FROM trabajadores WHERE id=:id";
$consulta=$conexion->prepare($query);
$consulta->bindParam(':id',$usuario);
$consulta->execute();
if ($consulta->rowCount() > 0) {
    while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo
    }
}

?>