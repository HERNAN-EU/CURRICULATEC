<?php
include("conexion.php");
$nCtrl = $_POST["nctrl"];
$nombre = $_POST["nombre"];
$link = $_POST["url"];

$Query = "UPDATE usuarios 
               SET nCtrl='$nCtrl', nombre='$nombre', url='$link'
               WHERE nCtrl='$nCtrl'";
$Result = $conn->query($Query);

if (!$Result) {
    header("Location: error.php");
    exit();
} else {
    echo "<script>
            window.onload = function() {
                alert('El registro se modificó exitosamente.');
                // Redireccionar después de mostrar la alerta
                window.location.href = 'usuarios.php';
            }
          </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de Inserción en la Base de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #ff0000;
        }

        p {
            margin: 20px 0;
            color: #333;
        }

        button {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Error de Inserción en la Base de Datos</h1>
        <p>Ocurrió un error al intentar insertar los datos en la base de datos. Por favor, inténtalo de nuevo más tarde.</p>
        <button onclick="volver()">Volver</button>
    </div>

    <script>
        function volver() {
            // Redireccionar a la página anterior
            window.history.back();
        }
    </script>
</body>

</html>
