<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Consultas</title>
</head>
<body>
<div class="container">
<?php
include "header_admin.php";

//conexion
include "conexion.php";
//consulta select
if(isset($_POST['busqueda'])){
    $search = $_POST['busqueda'];}
$query4 ="SELECT * FROM consultas where nombre like '%$search%' or apellido LIKE '%$search%'";
$consulta4 = mysqli_query($conexion,$query4);
//ver resultados
$cantidadResultados = mysqli_num_rows($consulta4);

if ($cantidadResultados > 0) {
    echo "<span class= 'alert-success'>Cantidad de resultados: ".$cantidadResultados."<br>";
} else {
    echo "<span class='alert-danger'>No hay resultados</span>.<br>";
}
//prosesar los resultados
while ($datos = mysqli_fetch_array($consulta4)) {
    echo "<br> <h5>NOMBRE: ".$datos['nombre']." ".$datos['apellido']."</h5>";
    echo "<h5>TELEFONO: ".$datos['telefono']."</h5>";
    echo "<h5>EMAIL: ".$datos['email']."</h5>";
    echo "<h5>Mensaje: ".$datos['mensaje']."</h5>";
    echo "<hr>";
}

//liberar y cerrar
mysqli_free_result($consulta4);
mysqli_close($conexion);

//conexion
include "conexion.php";
//Consulta select
$query5 = "SELECT * FROM consultas";
$consulta5 = mysqli_query($conexion,$query5);
$cantidadResultados = mysqli_num_rows($consulta5);
    
                echo '<table class="table table-dark">
                <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
                <th scope="col">Mensaje</th>
                </tr>
                </thead>
                <tbody>';
                for ($i=0; $i < $cantidadResultados ; $i++) { 
                    
                    $datos = mysqli_fetch_array($consulta5);
                    
                    echo "<tr><td>".$datos['nombre']."</td>";
                    echo "<td>".$datos['apellido']."</td>";
                    echo "<td>".$datos['telefono']."</td>";
                    echo "<td> <a href='mailto:".$datos['email']."'> ".$datos['email']."</a></td>";
                    echo "<td>".$datos['mensaje']."</tr>";
                }
                echo '</tbody></table>';

//liberar y cerrar
mysqli_free_result($consulta5);
mysqli_close($conexion);

?>

</div>    

</body>
</html>