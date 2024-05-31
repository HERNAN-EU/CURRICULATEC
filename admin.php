<?php
include("conexion.php");
require("buscar.php");
//Eliminacion
$nCtrl=$_POST['nCtrl'];
$Query = "delete from registro where nombre='".$nCtrl."'";
$Result = $mysql->query( $Query );

if($Result!=null)
   	print("Se elimino con éxito el registro.");

else
  	print("No se pudo eliminar");


//Modificacion
$Query="UPDATE registro 
					SET
                    nCtrl = '".$_POST["nctrl"]."' ,  
                    nombre= '".$_POST["nombre"]."' , 
					contraseña= '".$_POST["password"]."' , 
					carrera = '".$_POST["carrera"]."', 
					semestre = '".$_POST["semestre"]."'
					WHERE nombre = '".$_POST["NombreBuscar"]."'";
					
					
print($Query."<br>");			
		  //$oMysql->query    seria como Objeto.metodo
$Result = $oMysql->query( $Query );  // se lanza la consulta

if($Result!=null)
   	print("Se modifico");

else
  	print("No se pudo modicar");
?>