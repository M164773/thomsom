<?php
  include_once('assets/php/conexion.php');
  include_once('assets/php/loginUsuario.php');

  if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embotelladora Thomsom</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body onload="mostrarClientesSelect(); mostrarClientes(); mostrarRegistros()" class="bg-primary bg-gradient">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand fw-bolder text-light" href="#"><i class="bi bi-droplet-fill text-info"></i> THOMSOM</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-auto" role="buscar" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
              <input type="submit" class="btn btn-danger" value="Cerrar Sesión" name="CS">
            </form>
          </div>
        </div>
    </nav>
    <div class="container">
      <h1 class="text-center text-light fw-bolder my-5">Registros</h1><br>
      <div class="row">
        <form class="col col-5 col-sm-5 border border-light bg-dark bg-gradient rounded-4 p-3" method="POST">
          <div class="mb-3">
            <label for="cedula" class="form-label text-light">Cédula del cliente</label>
            <input type="number" class="form-control" id="cedula" name="cedula">
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label text-light">Nombre del cliente</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="mb-3">
            <label for="ubicacion" class="form-label text-light">Ubicación del cliente</label>
            <select class="form-select" id="ubicacion" name="ubicacion">
                <option value="Zulia">Zulia</option>
                <option value="Caracas">Caracas</option>
                <option value="Guarico">Guarico</option>
                <option value="Bolívar">Bolívar</option>
                <option value="Mérida">Mérida</option>
                <option value="Barinas">Barinas</option>
                <option value="Trujillo">Trujillo</option>
            </select>
          </div>
          <button type="button" class="btn btn-primary" onclick="registrarClientes()">Registrar Cliente</button>
        </form>
        <form class="col col-5 col-sm-5 offset-2 offset-sm-2 border border-light bg-dark bg-gradient rounded-4 p-3" method="POST">
          <div class="mb-3">
            <label for="clientes" class="form-label text-light">Clientes</label>
            <select class="form-select" id="clientes" name="clientes">
                
            </select>
          </div>
          <div class="mb-3">
            <label for="cantidadBotellas" class="form-label text-light">Cantidad de botellas</label>
            <input type="number" class="form-control" id="cantidadBotellas" name="cantidadBotellas">
          </div>
          <button type="button" class="btn btn-primary" onclick="registrarBotellas()">Enviar Registro</button>
        </form>
      </div>
      <div class="row">
        <h1 class="text-center text-light fw-bolder my-5">Tabla de Clientes</h1>
        <div class="table-responsive col-12 col-sm-12">
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="bodyClientes">
              
            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-secondary" onclick="generarClientesPDF()">Generar PDF</button>
        
        <h1 class="text-center text-light fw-bolder my-5">Tabla de Registros</h1>
        <div class="table-responsive col-12 col-sm-12">
          <table class="table">
            <thead class="table-dark">
              <th>ID</th>
              <th>Cantidad</th>
              <th>Hora</th>
              <th>Fecha</th>
              <th>Cliente</th>
              <th>Ubicación</th>
              <th>Acciones</th>
            </thead>
            <tbody id="bodyRegistros">

            </tbody>
          </table>
        </div>
        <button type="button" class="btn btn-secondary" onclick="generarRegistrosPDF()">Generar PDF</button>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

    </script>
</body>
</html>