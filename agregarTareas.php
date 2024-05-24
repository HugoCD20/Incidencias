
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación</title>
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
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-group textarea {
            resize: vertical;
            height: 100px;
        }
        .form-group input[readonly],
        .form-group textarea[readonly] {
            background-color: #f9f9f9;
            color: #555;
        }
        .form-group .button-group {
            display: flex;
            justify-content: space-between;
        }
        .form-group button {
            width: 48%;
            padding: 12px;
            background-color: #922B21;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-group select option {
            padding: 6px;
        }
       
        
        .form-group button:hover {
            background-color: #D98880;
        }
        
        .form-group button.cancelar:hover {
            background-color: #D98880;
        }

        .botones{
          width: -400px;
          display: flex;
    align-items: flex-end;
    width: -400px;
    justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Tareas</h1>
        <?php
                include("funciones.php");
                $id_incidencia=$_POST["id_incidencia"];
                $datos=ConsultarIncidencia($id_incidencia);
                
            ?>
        <form action="validar-ntarea.php" method="POST">
        <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia; ?>">
            <!-- Campo de Título (Solo lectura) -->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <!-- Campo de Descripción (Solo lectura) -->
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" ></textarea>
            </div>
               <div class="botones">
                 <!-- Botones de Enviar y Cancelar -->
             <div class="form-group" style="display: flex;">
                <button type="submit" style="width: 90px;" name="accion" value="cancelar">Cancelar</button>
            </div>
             <div class="form-group" style="display: flex;">
                <button type="submit" style="width: 100px;" name="accion" value="enviar">Enviar</button>
            </div>
            </div>
        </form>
    </div>
</body>
</html>
