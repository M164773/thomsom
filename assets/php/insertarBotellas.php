<?php
    include_once('conexion.php');

    $cedula_cliente = $_POST['cliente'];
    $cantidad = $_POST['cantidad'];
    
    $query = "INSERT INTO thomsom_botellas(cantidad, hora_entrega, fecha_entrega, cedula_cliente) VALUES ('$cantidad', CURRENT_TIME(), CURDATE(), '$cedula_cliente')";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));

    echo "Registro agregado";
?>