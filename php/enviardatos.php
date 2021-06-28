<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

echo count($_POST);
//array
$nombre = $_POST['nombre'];
$apellido =  $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['correo'];
$consulta =  $_POST['consulta'];
$fecha = date('Y-m-d');

/*
//destinatario
$destinatario = "david_kenny02@hotmail.com";
$asunto = "Nueva consulta";
$mensaje = "Nombre: ".$nombre."<br>Apellido: ".$apellido."<br>Email: ".$email."<br>Consulta: ".$consulta;

//envio
$envio1 = mail($destinatario,$asunto,$mensaje);

//Prueba de envio

if($envio1===true){
    echo "Gracias ".$nombre."por escribirnos.";
}else{
    echo "error de envio <br>";
}

foreach($_POST as $datos){
         echo $datos."<br>";
     }
*/
//enviar a mysql

//conexion
include "conexion.php";

//consulta1
$consulta1 = "INSERT INTO consultas VALUES(0,'$nombre','$apellido','$telefono','$email','$consulta','$fecha')";
$consultaFinal = mysqli_query($conexion,$consulta1);

//cierre de conexion
$cierreConsulta = mysqli_close($conexion);

?>
</body>
</html>