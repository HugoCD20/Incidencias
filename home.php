<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            max-width: 800px; 
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
        .form-group textarea,
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
        }
        .form-group input[type="file"] {
            padding: 5px;
        }
        .form-group button {
            width: 100%;
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ced4da;
        }
        th, td {
            padding: 12px;
            text-align: left;
            color: #495057;
        }
        th {
            background-color: #CACFD2;
        }
        th button,
       td button {
    width: auto;
    padding: 5px 15px; /* Ajustado el espacio */
    background-color: #FDFEFE ;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}
        th button:hover,
        td button:hover {
            background-color: #5a6268;
        }
        
        header input[type="submit"] {
    background-color: #922B21;
    color: white;
    width: 140px; /* ajusta el ancho según tu preferencia */
    height: 40px; /* ajusta la altura según tu preferencia */
    font-size: 18px; /* ajusta el tamaño de la fuente según tu preferencia */
     border: none;
            border-radius: 8px;
}
.footer {
    background-color: #CACFD2;
    color: #495057;
    text-align: center;
    padding: 6px;
    width: 98%;
}
    </style>
</head>
<body>
    <div class="container">
      <header>
    <?php
        if (isset($_SESSION['id'])) {
            if ($_SESSION["role"] == "Cordinador") {
                echo "<a href='trabajadores.php'><input type='submit' value='Registrar'></a>";
                echo "&nbsp;"; 
                echo "<a href='cerrar_sesion.php'><input type='submit' value='Cerrar sesión'></a>";
            } else {
                echo "<a href='cerrar_sesion.php'><input type='submit' value='Registrar'></a>";
            }
        }else{
            echo "<a href='login.php'><input type='submit' value='Login'></a>";
        }
    ?>
</header>
        <main>
            <h1>Incidencias</h1>
            <table>
                <tr>
                    <th>ID-Incidencia</th>
                    <th>Trabajador</th>
                    <th>Estado</th>
                </tr>
                <tr>
                    <td>#343a40</td>
                    <td>Edgar Vivar Najera</td>
                    <td><button>Asignado</button><button>Ver detalles ></button></td>
                </tr>
            </table>
        </main>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <div class="footer">

            <footer>
                <p>Copyright © 2024</p>
            </footer>
        </div>

    </div>
</body>
</html>