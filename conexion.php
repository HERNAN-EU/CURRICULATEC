<?php
try {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "curriculatec";

    $conn = new PDO("mysql:host=localhost;dbname=curriculatec",$username,$password,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    // Establecer el modo de errores a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>