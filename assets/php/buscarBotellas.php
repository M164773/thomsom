<?php
    include_once('conexion.php');

    $query = "SELECT thomsom_botellas.*, thomsom_clientes.ubicacion FROM thomsom_botellas INNER JOIN thomsom_clientes ON thomsom_botellas.cedula_cliente = thomsom_clientes.cedula";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $json = array();
    while($fila = mysqli_fetch_array($rs)){
        $json[] = array(
            'id' => $fila[0],
            'cantidad' => $fila[1],
            'hora_entrega' => $fila[2],
            'fecha_entrega' => $fila[3],
            'cedula_cliente' => $fila[4],
            'ubicacion' => $fila[5]
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>