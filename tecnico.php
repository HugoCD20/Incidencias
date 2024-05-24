<?php
session_start();
 $id_tecnico= $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico Tareas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
        .welcome {
            text-align: center;
            margin-bottom: 20px;
            color: #495057;
            font-weight: 500;
        }
        .welcome input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ced4da;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #922B21;
            color: white;
            font-weight: 700;
        }
        td a {
            color: #000;
            text-decoration: none;
            font-weight: 500;
        }
        td a:hover {
           
        }
        .logout-button {
            display: block;
            width: 50%;
            padding: 10px;
            margin: 20px auto 0;
            background-color: #922B21;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #c0392b;
        }
        .btn {
            margin-top: 10px;
            margin-right: 5px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>


<div class="container">
    <h1>Técnico Tareas </h1>
    <div class="welcome to ">
        Bienvenido
    </div>

    <table>
        <tr>
            <th>Incidencias Asignadas</th>
        </tr>
        <?php
        include("conexion.php");

        $query = "SELECT incidencias.id_incidencia, incidencias.incidencia FROM asignacion  JOIN incidencias ON asignacion.id_incidencia = incidencias.id_incidencia  WHERE asignacion.id_tecnico = :id_tecnico";

        $consulta = $conexion->prepare($query);
        $consulta->bindParam(':id_tecnico', $id_tecnico, PDO::PARAM_INT);
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos = json_decode($registro['incidencia'], true);
                if($datos["etapa_actual"]<5){
                echo "<tr>
                        <td>".$datos['titulo']." - ".$datos['descripcion']."<br>
                        <form action='comentarios.php' method='POST' style='display: inline;'>
                            <input type='hidden' name='id_incidencia' value='".$registro['id_incidencia']."'>
                            <button type='submit' class='btn'>Enviar Mensaje</button>
                        </form>
                        <form action='tareas.php' method='POST' style='display: inline;'>
                            <input type='hidden' name='id_incidencia' value='".$registro['id_incidencia']."'>
                            <button type='submit' class='btn btn-secondary'>Resolver</button>
                        </form>
                        </td>
                      </tr>";
                    }
            }
        }

        
        ?>
    </table>

    <a href="cerrar_sesion.php"><button class="logout-button">Cerrar sesión</button></a>
</div>

</body>
</html>