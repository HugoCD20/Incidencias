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
    </style>
</head>
<body>

<div class="container">
    <h1>Técnico Tareas</h1>
    <div class="welcome">
        Bienvenido
    </div>

    <table>
        <tr>
            <th>Tareas</th>
        </tr>
        <tr>
            <td><a href="tareaProceso.html">Tarea 1</a></td>
        </tr>
        <tr>
            <td><a href="tareaProceso.html">Tarea 2</a></td>
        </tr>
        <tr>
            <td><a href="tareaProceso.html">Tarea 3</a></td>
        </tr>
    </table>

    <a href="cerrar_sesion.php"><button class="logout-button">Cerrar sesión</button></a>
</div>

</body>
</html>
