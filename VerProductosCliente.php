<?php include("conexion.php")?>

<?php 

//consultar datos de la base de datos
$objconexion =  new conexion();
$resultado = $objconexion->consultar("SELECT * FROM `registro producto`");
//print_r($resultado);




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
  <link rel="stylesheet" href="Style.css">
  
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
            <a class="nav-link active" aria-current="page" href="indexCliente.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./Productos.php">Ver Productos</a>
          </li>
        </ul>
        <form class="d-flex" role="Cerrar" action="./loginCliente.php">
          <div class="container">
            <button href="Cerrar.php" class="btn btn-warning">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </nav>




<!-- Cards de Productos-->

<body>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php foreach ($resultado as $registro_producto) { ?>
                <div class="col">
                    <div class="card">
                        <img width="100" alt="" src="imagenes/<?php echo $registro_producto['Imagen'] ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $registro_producto['Nombre'] ?></h5>
                            <p class="card-text"><?php echo $registro_producto['Marca'] ?></p>
                            <p class="card-text"><?php echo $registro_producto['Fecha'] ?></p>
                            <p class="card-text"><?php echo $registro_producto['Precio'] ?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProducto<?php echo $registro_producto['id'] ?>">
                                Ver
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalProducto<?php echo $registro_producto['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detalles del Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Nombre:</strong> <?php echo $registro_producto['Nombre'] ?></p>
                                <p><strong>Marca:</strong> <?php echo $registro_producto['Marca'] ?></p>
                                <p><strong>Fecha:</strong> <?php echo $registro_producto['Fecha'] ?></p>
                                <img src="imagenes/<?php echo $registro_producto['Imagen'] ?>" alt="Imagen del Producto" class="img-fluid">
                                <!-- Agrega aquí más detalles del producto -->
                                <p><strong>Precio:</strong> <?php echo $registro_producto['Precio'] ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <style>
        /* Estilo del fondo de pantalla */
        body {
            background-image: url("./Fotoicon/13249.png");
            background-attachment: fixed;
            background-size: cover;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-repeat: no-repeat;
            background-position: center;
            z-index: -1;
        }

        /* Estilo para ajustar el margen entre el formulario y la tabla */
        .custom-margin {
            margin-top: 20px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>