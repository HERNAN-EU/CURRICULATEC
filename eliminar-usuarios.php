<?php
include("conexion.php");
$nCtrl = $_GET['nCtrl'];
$Query = "DELETE FROM usuarios WHERE nCtrl= '$nCtrl'";
$Result = $conn->query($Query);

if($resultado){
    header("Location:usuarios.php");
}else{
    echo("EL USUARIO NO PUDO ELIMINARSE");
    header("Location:usuarios.php");
}
?>
