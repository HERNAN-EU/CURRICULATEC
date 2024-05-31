<?php
include("conexion.php");
$nCtrl = $_GET['nCtrl'];
$Query = "DELETE FROM registro WHERE nCtrl= '$nCtrl'";
$Result = $conn->query($Query);

if($resultado){
    header("Location:deshboard.php");
}else{
    echo("EL USUARIO NO PUDO ELIMINARSE");
    header("Location:deshboard.php");
}
?>