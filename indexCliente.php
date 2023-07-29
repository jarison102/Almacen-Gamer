<?php
session_start();
if (isset($_SESSION['Telefono']) != "321567890") {
  header("location:loginCliente.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Inicio</title>
  <link href="./Fotoicon/descarga.jpg" rel="icon">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark border-bottom navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TKGAME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./VerProductosCliente.php">Ver Productos</a>
          </li>
        </ul>
        <form class="d-flex" role="Cerrar" action="./login.php">
          <div class="container">
            <button href="Cerrar.php" class="btn btn-warning">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <style>
        body {
            /* Establece el GIF como fondo de pantalla */
            background-image: url("./Fotoicon/preview.jpg");
            /* Fija el fondo para que no se desplace con el contenido */
            background-attachment: fixed;
            /* Ajusta el tamaño del fondo para cubrir todo el viewport */
            background-size: cover;
            /* Asegura que la imagen de fondo ocupe toda la pantalla */
            width: 100%;
            height: 100%;
            /* Asegura que no haya espacios en blanco alrededor del GIF */
            margin: 0;
            padding: 0;
            /* Evita la repetición del fondo */ 
            background-repeat: no-repeat;
            background-position: center;
            z-index: -1;
        }

    </style>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>