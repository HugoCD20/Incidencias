<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pruebas</title>
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
             .form-group textarea {
            resize: vertical;
            height: 120px;
            width: 100%;
        }

        .form-group1{
            display: flex;
            justify-content: space-between;
        }

        .mostra{
            display: flex;
          flex-direction: column;
        }
        .datos{
            display: flex;
            justify-content: space-around;
    align-items: baseline;
        }
</style>
</head>
<body>
<div class="container">
<h1>Pruebas</h1>
            <?php
                include("funciones.php");
                $id_incidencia=$_POST["id_incidencia"];
                $datos=ConsultarIncidencia($id_incidencia);
                
            ?>
<form action="validar-prueba.php" method="post" style="text-align:center;" enctype="multipart/form-data">
     <div class="form-group">
     <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia; ?>">
            <label for="Nombre">Titulo:</label>
            <p><?php echo $datos["titulo"]?></p>
       </div>
     <div class="form-group">
            <label for="Apellido">Descripción:</label>
             <p><?php echo $datos["descripcion"]?></p>
       </div>
        <div class="form-group">
            <label for="descripcion">Resultados de las pruebas:</label>
            <textarea id="descripcion" name="resultado" required></textarea>
        </div>

        <?php
       Consultarmensajes($id_incidencia);
   ?>
    <div class="form-group1">
      <div class="form-group">
            <button type="submit" id="opcion" name="opcion" value="agregar">cancelar</button>
     </div>
     <div class="form-group">
            <button type="submit" id="opcion" name="opcion" value="no_pasa">No pasa</button>
     </div>
     <div class="form-group">
            <button type="submit" id="opcion" name="opcion" value="pasa">Pasa</button>
     </div>
 </div>
    </form>
 </div>
</body>
</html>