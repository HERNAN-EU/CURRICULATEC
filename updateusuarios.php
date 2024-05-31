<?php
include("conexion.php");

$id = $_GET['nCtrl'];
$Query = "SELECT * FROM usuarios WHERE nCtrl = '$id'";
$Result = $conn->query($Query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN CURRICULATEC</title>
    <link rel="stylesheet" href="css/update.css">
    <script src="https://kit.fontawesome.com/6a18b5e1c5.js" crossorigin="anonymous"></script>

</head>
<link rel="icon" href="img/logo.jpg">

<body>
    <nav>
        <div class="container-nav">
        <img src="img/Logo.jpg" alt="LOGO" class="logo">
        <pre>     </pre><h1>ADMIN CURRICULATEC</h1>
        </div>
    </nav>
    <div class="contenedor">
        <div class="aside">
            <div class="menu-tablas">
                <h3>Tablas</h3>
                <li><a href="deshboard.php">REGISTROS</a></li>
                <li for="usuarios"><a name="usuarios" href="usuarios.php">USUARIOS</a></li>
            </div>
        </div>
        <div class="content">
            <div class="contenido-tablas">
                <div class="barra-busqueda">
                    <h2><i class="icono fa-solid fa-table"></i>ACTUALIZAR INFORMACIÓN - OMIT</h2>
                </div>

                <form class="formulario" action="modificarusuarios.php" method="POST">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>DATOS DEL USUARIO</th>
                                <th>CONTENIDO DE REGISTRO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Result = $conn->query($Query);
                            while ($row =$Result->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><label class="label-uptade" for="nombre">Numero de control:</label></td>
                                    <td><input class="entrada-uptade" type="text" id="nctrl" name="nctrl" value="<?php echo $row["nCtrl"] ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label class="label-uptade" for="nombre">Nombre:</label></td>
                                    <td><input class="entrada-uptade" type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"] ?>" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="label-uptade" for="url">URL:</label>
                                    </td>
                                    <td>
                                        <input class="entrada-uptade" type="text" id="url" name="url" value="<?php echo $row["url"] ?>" required>
                                    </td>
                                </tr>
                        </tbody>
                    <?php } ?>

                    </table>
                    <button onclick="confirmacion(event)" class="btn">Modificar Registro <i class="fa-solid fa-floppy-disk icono"></i></button>

                    <button onclick="redireccionar(event)" class="btn">Volver a Inicio <i class="fas fa-rotate-right icono"></i></button>
                </form>
                </div>
            </div>
            <script>
                function redireccionar(event) {
                    event.preventDefault(); // Evita que el formulario se envíe si está dentro de uno
                    // Redireccionar a la página 'dashboard.php'
                    window.location.href = 'deshboard.php';
                }
            </script>
</body>
<script src="js/confirmacion.js"></script>

</html>