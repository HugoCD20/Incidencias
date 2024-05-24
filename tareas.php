<?php
session_start();
?>
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
        <h1>Tarea</h1>
        
            <?php
                include("funciones.php");
                $id_incidencia=$_POST["id_incidencia"];
                $datos=ConsultarIncidencia($id_incidencia);

            ?>
            <!-- Campo de Título (Solo lectura) -->
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $datos["titulo"]?>" readonly>
            </div>
            <!-- Campo de Descripción (Solo lectura) -->
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" readonly><?php echo $datos["descripcion"]?></textarea>
            </div>
            <form action="pruebas.php" method="POST">
            <?php
                include("conexion.php");
                $query="SELECT * FROM tareas where id_incidencia=:id_incidencia";
                /*$query="SELECT * FROM tareas where id_incidencia=:id_incidencia";*/
                $consulta=$conexion->prepare($query);
                $consulta->bindParam(':id_incidencia', $id_incidencia);
                $consulta->execute();
                $bandera=TRUE;
                if ($consulta->rowCount() > 0) {
                    while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $datos = json_decode($registro['tarea'], true);
                        if($datos['Estado']=='activo'){
                            $bandera=FALSE;
                       
                        echo " <div class='botones'>
                        <div class='form-group'>
                            <label for='descripcion'>Tarea:</label>
                            <input type='text' id='tarea' name='tarea' disabled='disabled' placeholder='".$datos["titulo"]."'>
                        </div><input type='hidden' name='id_incidencia' value='". $id_incidencia."'>

                        <!-- Botones de Enviar y Cancelar -->
                        
                        
                        <form action='finalizar_tarea.php'method='POST'>
                            <div class='form-group button-group'>
                            
                    <input type='hidden' name='id_incidencia' value='". $id_incidencia."'>
                            <button type='submit' style='width: 100px;' name='accion' value='". $registro['id_tarea']."'>Finalizado</button>
                        
                            </div>
                        </form>

                        
                    </div>
                ";
            }   
                    }
                }
            ?>
            
             <form action="agregarTareas.php" method="POST">
                <div class="form-group button-group">
                    <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia; ?>">
                    <button type="submit">Agregar Nueva tarea</button>
                </div>
            </form>
            <?php
            if($bandera){
                echo "<form action='pruebas.php' method='POST'>
                <div class='form-group button-group'>
                    <input type='hidden' name='id_incidencia' value='$id_incidencia'>
                    <button type='submit'>Finalizar</button>
                </div>
            </form>";
            }
            
            ?>

    </div>
</body>
</html>
