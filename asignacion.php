<?php
$decision=$_GET["botones"];
if($decision=="asignar"){
    include("asignar.php");
}else{
    include("detalles.php");
}
?>
