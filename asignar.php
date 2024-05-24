
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
            height: 120px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Asignación</h1>
        <form action="Validar-asignacion.php" method="post">
            <!-- Campo de Título (Solo lectura) -->
            <?php
            
                $id_incidencia=$_GET["id_incidencia"];        
        echo "<input type='hidden' name='id_incidencia' value='".$id_incidencia."'>";
                include("conexion.php");
                $query="SELECT * FROM incidencias where id_incidencia=:id_incidencia";
                $consulta=$conexion->prepare($query);
                $consulta->bindParam(':id_incidencia', $id_incidencia);
                $consulta->execute();
                if ($consulta->rowCount() > 0) {
                    while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        $datos = json_decode($registro['incidencia'], true);
                        echo "<div class='form-group'>
                                <label for='titulo'>Título:</label>
                                <input type='text' id='titulo' name='titulo' value='".$datos["titulo"]."' readonly>
                            </div>";
                        echo "<div class='form-group'>
                                <label for='descripcion'>Descripción:</label>
                                <textarea id='descripcion' name='descripcion' readonly>".$datos["descripcion"]."</textarea>
                            </div>";
                    }
                }
            ?>
            
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <select id="mensaje" name="mensaje">
                    <?php
                        $query2="SELECT * FROM trabajadores";
                        $consulta2=$conexion->prepare($query2);
                        $consulta2->execute();
                        if ($consulta2->rowCount() > 0) {
                            while ($registro2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {                                
                                $datos2 = json_decode($registro2['trabajador'], true);
                                if($datos2["rol"]=="Tecnico"){
                                    echo"<option value='".$registro2["id_trabajador"]."'>"." ".$datos2["nombre"]." ".$datos2["apellido"]."</option>";
                                }
                            }
                        }
                            
                        
                    ?>
                    
                    <!-- Agrega más opciones si es necesario -->
                </select>
            </div>
            <!-- Botones de Enviar y Cancelar -->
            <div class="form-group button-group">
                <button type="submit">Enviar</button>
                <button type="submit">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>
