<?php
    include_once('conexion.php');

    session_start();
    
    $query = "SELECT * FROM thomsom_usuario";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $fila = mysqli_fetch_array($rs);
    $error = "";
    
    if(isset($_POST['IS']) && $_POST['IS'] == 'Iniciar Sesión'){
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        if($usuario == $fila[0] && $clave == $fila[1]){
            if(!isset($_SESSION['usuario'])){
                $_SESSION['usuario'] = [];
            }
            $_SESSION['usuario'] = [$usuario, $clave];
            echo $_SESSION['usuario'][1];
            header("Location: index.php");
        } else{
            $error = "Los valores son incorrectos. Intente de nuevo.";
        }
    }
    
    if(isset($_POST['CS']) && $_POST['CS'] == 'Cerrar Sesión'){
        session_destroy();
        header("Location: login.php");
    }
    
?>