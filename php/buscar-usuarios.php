<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "curriculatec";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    // Establecer el modo de errores a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/deshboard.css">
    <script src="https://kit.fontawesome.com/6a18b5e1c5.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table td,
        th {
            text-align: center;
            border: 1px solid #dee2e6;
            padding: 10px;
            margin: 0;
        }

        .columnas {
            position: sticky;
            top: 0;
            background-color: black;
            color: white;
        }

        .center {
            display: flex;
            justify-content: center;
        }

        .btn-modificar {
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 300ms;
            background-color: green;
            border: 0;
            border-radius: 4px;
            width: 60px;
            height: 35px;
            text-align: center;
            color: white;
            cursor: pointer;
        }

        .btn-modificar:hover {
            background-color: black;
            transition: all 300ms;
            color: white;
        }

        #hover:hover {
            background-color: black;
            transition: all 300ms;
            color: white;
        }

        .btn-eliminar {
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 300ms;
            background-color: red;
            border: 0;
            border-radius: 4px;
            width: 60px;
            height: 35px;
            text-align: center;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include("../conexion.php"); // Incluir el archivo de conexión
    $columnas = ['nCtrl', 'nombre'];
    $table = "usuarios";
    $campo = isset($_POST['campo']) ? $_POST['campo'] : null;
    $where = '';
    if ($campo != null) {
        $where = " WHERE (";
        $cont = count($columnas);
        for ($i = 0; $i < $cont; $i++) {
            $where .= $columnas[$i] . " LIKE ? OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }
    $sql = "SELECT " . implode(", ", $columnas) . " FROM $table $where";
    
    $stmt = $conn->prepare($sql);
    
    if ($campo != null) {
        for ($i = 0; $i < $cont; $i++) {
            $stmt->bindValue($i + 1, "%$campo%", PDO::PARAM_STR);
        }
    }
    
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $html = '';
    if (count($resultado) > 0) {
        $html .= '<tr>';
        $html .= '<th class="columnas">nCtrl</th>';
        $html .= '<th class="columnas">Nombre</th>';
        $html .= '<th class="columnas" colspan="2">Controladores</th>';
        $html .= '</tr>';
        foreach ($resultado as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['nCtrl'] . "</td>";
            $html .= '<td>' . $row['nombre'] . "</td>";
            $html .= '<td><div class="center"><a href="php/eliminar-registros.php?id=' . $row["nCtrl"] . '" class="btn-eliminar" id="hover" onclick="confirmacion(event)"><i style="text-align:center;" class="fa-solid fa-trash"></i></a></div></td>';
            $html .= '<td><div class="center"><a href="php/update.php?id=' . $row["nCtrl"] . '" class="btn-modificar" id="hover" onclick="confirmacion(event)"><i style="text-align:center;" class="fa-solid fa-pen"></i></a></div></td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr><td colspan="4">EL REGISTRO BUSCADO NO EXISTE</td></tr>';
    }
    echo $html;
    ?>
</body>
<script>
    function confirmacion(evento) {
        // Preguntar al usuario si desea eliminar el registro
        var confirmacion = confirm("¿Deseas eliminar este registro?");
        // Si el usuario confirma
        if (confirmacion == true) {
            // Preguntar al usuario su nombre
            var contraseña = prompt("Por favor, introduce la contraseña:");
            // Si la contraseña es correcta
            if (contraseña !== null && contraseña == "ADMIN") {
                return true;
            } else {
                evento.preventDefault();
                alert("No se proporcionó la contraseña o es incorrecta. Acción cancelada.");
            }
        } else {
            evento.preventDefault();
            alert("Acción cancelada.");
        }
    }
    let linkDelete = document.querySelectorAll(".btn-eliminar");
    for (let i = 0; i < linkDelete.length; i++) {
        linkDelete[i].addEventListener('click', confirmacion);
    }
</script>

</html>
