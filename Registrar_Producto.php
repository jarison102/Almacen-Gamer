<?php include("conexion.php") ?>


<?php
//insertar datos en la base de datos
if ($_POST) {
    $Producto = $_POST['Producto'];
    $Marca = $_POST['Marca'];
    $Fecha = $_POST['Fecha'];
    $Imagen =$_FILES['Archivo']['name'];
    $Imagen_temporal=$_FILES['Archivo']['tmp_name'];
    move_uploaded_file($Imagen_temporal,"imagenes/".$Imagen);
    $Precio =$_POST['Precio'];

    $objconexion =  new conexion();

    $sql = "INSERT INTO `registro producto`(`id`, `Nombre`, `Marca`, `Fecha`,`Imagen`,`Precio`) VALUES (Null,'$Producto','$Marca','$Fecha','$Imagen','$Precio');";

    $objconexion->ejecutar($sql);
}

//borrar informacion de la base de datos
if ($_GET) {
    $id = $_GET['borrar'];
    $objconexion = new conexion();
    $sql = "DELETE FROM `registro producto` WHERE `registro producto`.`id` = " . $id;
    $objconexion->ejecutar($sql);
}

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
    <title>Registro de Productos</title>
    <link href="./Fotoicon/descarga.jpg" rel="icon">
    <style>
        /* Estilo del fondo de pantalla */
        body {
            background-image: url("./Fotoicon/21133731_2108.w023.n001.937B.p1.937.jpg");
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-md-8">
                            <br>
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h1>Registro De Productos</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="Registrar_Producto.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        Nombre Del Producto:
                                        <br>
                                        <input type="text" name="Producto" id="" class="form-control">
                                        <br>
                                        Marca Del Producto:
                                        <br>
                                        <input type="text" name="Marca" id="" class="form-control">
                                        <br>
                                        Fecha Del Producto:
                                        <br>
                                        <input type="date" name="Fecha" id="" class="form-control">
                                        <br>
                                        Selecciona Imagen:
                                        <input type="file" name="Archivo" class="form-control" id="">
                                        <br>
                                        Precio Del  Producto:
                                        <input type="text" name="Precio" class="form-control" id="">
                                        <br>
                                        <input type="submit" value="Registrar Producto" class="btn btn-warning">
                                        <br>
                                        
                                    </form>
                                    <br>
                                    <form action="./index.php">
                                            <input type="submit" value="Volver" class="btn btn-success">
                                        </form>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-6 custom-margin">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado as $registro_producto) { ?>
                                <tr>
                                    <td><?php echo $registro_producto['id'] ?></td>
                                    <td><?php echo $registro_producto['Nombre'] ?></td>
                                    <td><?php echo $registro_producto['Marca'] ?></td>
                                    <td><?php echo $registro_producto['Fecha'] ?></td>
                                    <th><img width="100" alt="" src="imagenes/<?php echo $registro_producto['Imagen']?>" alt=""></th>
                                    <td><?php echo $registro_producto['Precio'] ?></td>
                                    <td><a href="?borrar=<?php echo $registro_producto['id']; ?>" class="btn btn-danger">Borrar</a></td>
                                    <td><a href="editar_producto.php?id=<?php echo $registro_producto['id']; ?>" class="btn btn-warning">Editar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>