<?php
    include_once('conexion.php');

    $registro = $_POST['i'];

    $query = "DELETE FROM thomsom_botellas WHERE id='$registro'";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));

    echo "Registro eliminado";
?>