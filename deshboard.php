<?php
include("conexion.php");
$Query = "SELECT * FROM registro";
$Result = $conn->query($Query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN CURRICULATEC</title>
    <link rel="stylesheet" href="css/deshboard.css">
    <script src="https://kit.fontawesome.com/6a18b5e1c5.js" crossorigin="anonymous"></script>
    
</head>
<link rel="icon" href="img/logo.jpg">

<body>
    <nav>
        <div class="container-nav">
            <img src="img/Logo.jpg" alt="LOGO" class="logo">
            <pre>     </pre><h1>DESHBOARD CURRICULATEC</h1>
        </div>
    </nav>
    <div class="contenedor">
        <div class="aside">
            <div class="menu-tablas">
                <h3>Tablas</h3>
                <li for="registros"><a name="registros" href="deshboard.php">REGISTROS</a></li>
                <li><a href="usuarios.php">USUARIOS</a></li>
            </div>
        </div>
        <div class="content">
            <div class="contenido-tablas">
                <div class="barra-busqueda">
                    <h2><i class="icono fa-solid fa-table"></i>REGISTROS DE USUARIOS</h2>
                    <div class="caja-buscador">
                        <label for="campo">Buscar <i class="icono2 fa-solid fa-magnifying-glass"></i></label>
                        <input type="text" name="campo" id="campo">
                    </div>
                </div>
                <div id="container-tabla">
                    <table id="content">
                        <tr>

                            <th class="columnas">Numero de control</th>
                            <th class="columnas">Nombre</th>
                            <th class="columnas">Contraseña</th>
                            <th class="columnas">Carrera</th>
                            <th class="columnas">Semestre</th>
                            <th class="columnas" colspan="2">Controladores</th>
                        </tr>
                        <?php
                        while($row =$Result->fetch(PDO::FETCH_ASSOC)) {	    
                            ?>
                            <tr>
                            <td> <?php printf($row["nCtrl"]); ?>   </td>
                           
                            <td> <?php printf($row["nombre"]); ?>   </td>
                           
                            <td> <?php printf($row["contraseña"]); ?>   </td>
                            <td> <?php printf($row["carrera"]); ?>   </td>
                            <td> <?php printf($row["semestre"]); ?>   </td>
                            <td>
                                <div class="center"><a href="eliminar-registros.php?nCtrl=<?php echo $row["nCtrl"]; ?>" class="btn-eliminar" id="hover"><i style="text-align:center" ; class="fa-solid fa-trash"></i></a></div>
                            </td>
                            <td>
                                <div class="center"><a href="updateregistros.php?nCtrl=<?php echo $row["nCtrl"]; ?>" class="btn-modificar"><i style="text-align:center" ; class="fa-solid fa-pen"></i></a></div>
                            </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <script>
                    document.getElementById("campo").addEventListener("keyup", getData);

                    function getData() {
                        let input = document.getElementById("campo").value;
                        let content = document.getElementById("content");
                        let url = "php/buscar.php";
                        let formData = new FormData();
                        formData.append('campo', input);
                        fetch(url, {
                            method: "POST",
                            body: formData
                        }).then(response => response.text()).then(data => {
                            content.innerHTML = data;
                        }).catch(err => console.log(err));
                    }
                </script>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/confirmacion.js"></script>

</html>