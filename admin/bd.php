<?php

$servidor="localhost";
$baseDeDatos="website";
$usuario="root";
$contrasenia="";

try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contrasenia);
<<<<<<< HEAD
<<<<<<< HEAD
   // echo "Conexion realizada...";
=======
    echo "Conexion realizada...";
>>>>>>> e2db0b1 (17/12/23 6:00pm)
=======
   // echo "Conexion realizada...";
>>>>>>> 5f7a79f (mensaje para llamar)

}catch(Exception $error){
    echo $error->getMessage();
}   

?>