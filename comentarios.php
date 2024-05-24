
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Lectura</title>
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
        .form-group button:hover {
            background-color: #D98880;
        }
        .form-group button.cancelar:hover {
            background-color: #D98880;
        }
    </style>
</head>
<body>

<?php
    include("conexion.php");
    
    $idIncAct = $_POST['id_incidencia']; 

    $query = "SELECT * FROM incidencias WHERE id_incidencia = :id_incidencia";
    $consulta = $conexion->prepare($query);
    $consulta->bindParam(':id_incidencia', $idIncAct, PDO::PARAM_INT);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {
        $registro = $consulta->fetch(PDO::FETCH_ASSOC);
        $datos = json_decode($registro['incidencia'], true);
        $titulo = $datos['titulo'];
        $descripcion = $datos['descripcion'];
    } else {
        echo "no encontrado";
    }
?>

<div class="container">
    <h1>Comentario</h1>
    <form id="comentarioForm" action="validar_comentario.php" method="post">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo ?>" readonly>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" readonly><?php echo $descripcion; ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" placeholder="Comentario"></textarea>
        </div>

        <input type="hidden" name="id_incidencia" id="id_incidencia" value=" <?php echo $idIncAct ?>">
        
        
        <!-- Botones de Enviar y Cancelar -->
        <div class="form-group button-group">
            <button type="submit" value="enviar" name="comentario">Enviar</button>
            <button type="submit" value="cancelar" name="comentario">Cancelar</button>
        </div>
    </form>
</div>



</body>
</html>