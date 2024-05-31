<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <div class="formulario">
    <?php
session_start();
header('Content-Type: text/html; charset=UTF-8');

include("conexion.php");

// Obtener datos del formulario
$nctrl = $_POST['nctrl']; 
$password = $_POST['password'];


// Buscar el usuario en la base de datos
$Query = "SELECT * FROM registro WHERE nCtrl ='".$nctrl."'";
$Result = $conn->query($Query);

if ($Result === false) {
    die("Error al ejecutar la consulta: " . $conn->error);
}
?>
<div id="contenedor"><?php
// Verificar si se encontró el usuario
// if ($Result->num_rows > 0) {
//     $row = $Result->fetch_assoc();

if ($Result->rowCount() > 0) {
    $row = $Result->fetch(); // Obtener la fila de resultados
    
    // Verificar la contraseña
   if (password_verify($password, $row["contraseña"])) {
        // Contraseña correcta: Iniciar sesión y establecer variables de sesión
        $nombre = $row["nombre"];
        $_SESSION['nombre'] = $nombre;
        if($password=="admin"){
            //admin.php
            header("Location: deshboard.php");
        }else{
        header("Location: formulario.html");          // Redirigir a las página principal después de iniciar sesión
        }
        exit;                                   // Finalizar el script después de redirigir
    } else if($password==$row["contraseña"]) {
        $nombre = $row["nombre"];
        $_SESSION['nombre'] = $nombre;
        if($password=="admin"){
            header("Location: deshboard.php");
        }else{
        header("Location: formulario.html");          // Redirigir a la página principal después de iniciar sesión
        }
        exit;
    } 
    else{
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    ?>
    <br> <a href="login.html">Regresar al inicio</a>
    <?php
    }
} else {
    // Usuario no encontrado
    echo "Usuario no encontrado.";
?>
<div class="formulario">
    <h1>¿Desea registrarse?</h1>
    <a href="registro.html" class="volver">Registrar usuario</a>
    <br>
    <br>
    <a href="login.html" class="volver">Regresar al inicio</a>
</div>
   
    <?php
    
    exit; // Finalizar el script después de redirigir
}?>
</div>

<?php
$conn = null;
?>
</div>
</body>

</html>