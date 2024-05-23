<?php

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

         .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #922B21 ;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .form-group button:hover {
            background-color: #D98880;
        }

           .form-group input[type="file"] {
            padding: 5px;
        }

          .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
</style>
</head>
<body>
<div class="container">
<h1>Registrar Trabajador</h1>
<form action="validar-registro.php" method="post" style="text-align:center;" enctype="multipart/form-data">
     <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
       </div>
     <div class="form-group">
            <label for="Apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
       </div>
       <div class="form-group">
            <label for="Contraseña">Contraseña:</label>
            <input type="text" id="Contraseña" name="Contraseña" required>
       </div>
       <div class="form-group">
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="trabajador">Trabajador</option>
                <option value="Tecnico">Tecnico</option>
                <option value="resolución">Cordinador</option>           
                </select>
        </div>
      <div class="form-group">
            <button type="submit">Agregar</button>
     </div>
    </form>
 </div>
</body>
</html>