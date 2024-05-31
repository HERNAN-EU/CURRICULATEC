<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre'])) {
    header("Location: index.php"); // Redirigir a la página de inicio de sesión
    exit;
}

// Resto del código aquí
echo "Bienvenido, " . $_SESSION['nombre'];

?>
<div class="container-flex">
 <br> <a href="../AgendaPHPConActualizar/index.php" class="volver">Ir al menu</a> 
 </div>
</body>
</html>



