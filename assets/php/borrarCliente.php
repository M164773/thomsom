<?php
    include_once('conexion.php');

    $cliente = $_POST['c'];

    $query = "DELETE FROM thomsom_botellas WHERE cedula_cliente='$cliente'";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));

    $query = "DELETE FROM thomsom_clientes WHERE cedula='$cliente'";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));

    echo "Cliente eliminado";
?>