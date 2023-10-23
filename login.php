<?php
    include_once('assets/php/loginUsuario.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embotelladora Thomsom</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-dark p-5">
    <h1 class="text-center text-primary fw-bolder">Inicio de Sesión</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="p-5">
        <div class="mb-3">
            <div class="text-center">
                <label for="usuario" class="form-label text-light fw-bolder">Usuario</label>
            </div>
            <input type="text" class="form-control my-3" id="usuario" name="usuario">
        </div>
        <div class="mb-3">
            <div class="text-center">
                <label for="clave" class="form-label text-light fw-bolder">Clave</label>
            </div>
            <input type="password" class="form-control my-3" id="clave" name="clave">
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Iniciar Sesión" name="IS">
        </div>
    </form>
    <h6 class="text-center text-danger"> <?php echo $error; ?> </h6>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>