<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];

    $query = "INSERT INTO thomsom_clientes (cedula, nombre, ubicacion) VALUES ('$cedula', '$nombre', '$ubicacion')";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));

    echo "Cliente agregado";
?>