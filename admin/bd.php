<?php

$servidor="localhost";
$baseDeDatos="website";
$usuario="root";
$contrasenia="";

try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contrasenia);
<<<<<<< HEAD
   // echo "Conexion realizada...";
=======
    echo "Conexion realizada...";
>>>>>>> e2db0b1 (17/12/23 6:00pm)

}catch(Exception $error){
    echo $error->getMessage();
}   

?>