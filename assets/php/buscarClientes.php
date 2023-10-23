<?php
    include_once('conexion.php');

    $query = "SELECT * FROM thomsom_clientes";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $json = array();
    while($fila = mysqli_fetch_array($rs)){
        $json[] = array(
            'cedula' => $fila['cedula'],
            'nombre' => $fila['nombre'],
            'ubicacion' => $fila['ubicacion']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>