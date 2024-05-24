<?php
include("funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro Trabajadores</title>
<link rel="stylesheet" type="text/css" href="votar.css">

<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
            h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
            font-weight: 700;
        }
 .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

         .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: flex;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
        }

        .form-group1{
            display: flex;
     align-content: stretch;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-evenly;
        }
        .cuadro{
            border: black 2px solid;
             margin: 0;
        }
.form-group0{
      position: relative;
  right: -180px;
}
</style>
</head>
<body>
<div class="container">
<h1>Detalles</h1>
     
       <?php
       $id_incidencia=$_GET["id_incidencia"];
       Consultarmensajes($id_incidencia);
   ?>
     
 </div>
</body>
</html>