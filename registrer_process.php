<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <?php
    // Incluir la conexión a la base de datos
    include("conexion.php");

    // Verificar que los datos se reciban correctamente
    if (isset($_POST['nctrl'], $_POST['nombre'], $_POST['password'], $_POST['carrera'], $_POST['semestre'])) {
        // Obtener datos del formulario de registro
        $nCtrl = $_POST['nctrl'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $carrera = $_POST['carrera'];
        $semestre = $_POST['semestre'];

        // Hash de la contraseña
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertar usuario en la base de datos
        $sql = "INSERT INTO registro (nCtrl, nombre, contraseña, carrera, semestre) VALUES (:nCtrl, :nombre, :password, :carrera, :semestre)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindValue(':nCtrl', $nCtrl);
        $stmt->bindValue(':nombre', $nombre);
        //$stmt->bindValue(':password', $hashedPassword);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':carrera', $carrera);
        $stmt->bindValue(':semestre', $semestre);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            ?>
            <script>alert("Gracias por registrarte");</script>
            <?php
            sleep(5);
            header("Location: login.html");
        } else {
            echo "Error al registrar usuario: " . $stmt->errorInfo()[2];
        }

        // Cerrar el cursor de la declaración
        $stmt->closeCursor();
    } else {
        echo 'Faltan datos del formulario.';
    }

    // Cerrar la conexión
    $conn = null;
    ?>
</body>

</html>
