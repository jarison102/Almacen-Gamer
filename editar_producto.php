<?php include("conexion.php") ?>

<?php
// editar_producto.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $id = $_POST['id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nueva_marca = $_POST['nueva_marca'];
    $nueva_fecha = $_POST['nueva_fecha'];
    $nueva_Imagen = $_FILES['nueva_Imagen'];
    $nuevo_Precio =$_POST['nuevo_Precio'];

    // Validar y actualizar el registro en la base de datos
    if (!empty($id) && !empty($nuevo_nombre) && !empty($nueva_marca) && !empty($nueva_fecha) && !empty($nueva_Imagen) && !empty($nuevo_Precio)) {
        // Manejo de la imagen
        if (isset($_FILES['nueva_Imagen']) && $_FILES['nueva_Imagen']['error'] === UPLOAD_ERR_OK) {
            // Ruta temporal del archivo subido
            $ruta_temporal = $_FILES['nueva_Imagen']['tmp_name'];

            // Nombre original del archivo
            $nombre_original = $_FILES['nueva_Imagen']['name'];

            // Mover el archivo temporal a una ubicación permanente (por ejemplo, una carpeta llamada "imagenes" dentro de tu proyecto)
            $ruta_permanente = 'imagenes/' . $nombre_original;
            move_uploaded_file($ruta_temporal, $ruta_permanente);

            // Actualizar el campo de imagen en la base de datos con el nombre del archivo
            $objconexion = new conexion();
            $sql = "UPDATE `registro producto` SET `Nombre` = '$nuevo_nombre', `Marca` = '$nueva_marca', `Fecha` = '$nueva_fecha', `Imagen` = '$nombre_original' WHERE `id` = $id";
            $objconexion->ejecutar($sql);
        } else {
            // Si no se cargó una nueva imagen, simplemente actualiza los otros campos sin modificar la imagen
            $objconexion = new conexion();
            $sql = "UPDATE `registro producto` SET `Nombre` = '$nuevo_nombre', `Marca` = '$nueva_marca', `Fecha` = '$nueva_fecha',`Precio`='$nuevo_Precio' WHERE `id` = $id";
            $objconexion->ejecutar($sql);
        }

        // Redireccionar a la página principal o a donde desees después de actualizar los datos del producto
        header("Location: Registrar_Producto.php");
        exit;
    } else {
        // Manejo de errores, si es necesario
        $error_message = "Por favor, completa todos los campos.";
    }
}

// Obtener el ID_DEL_PRODUCTO de la URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $objconexion = new conexion();
    $sql = "SELECT * FROM `registro producto` WHERE `id` = $id";
    $resultado = $objconexion->consultar($sql);
    $producto = $resultado[0];
} else {
    // Redireccionar a la página principal o mostrar un mensaje de error si no se proporciona el ID_DEL_PRODUCTO
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Producto</title>
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
                                    Editar
                                </div>
                                <div class="card-body">
                                    <h1>Editar Producto</h1>
                                    <form action="editar_producto.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                        <div class="mb-3">
                                            <label for="nuevo_nombre" class="form-label">Nuevo Nombre del Producto</label>
                                            <input type="text" name="nuevo_nombre" id="nuevo_nombre" class="form-control" value="<?php echo $producto['Nombre']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nueva_marca" class="form-label">Nueva Marca del Producto</label>
                                            <input type="text" name="nueva_marca" id="nueva_marca" class="form-control" value="<?php echo $producto['Marca']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nueva_fecha" class="form-label">Nueva Fecha del Producto</label>
                                            <input type="date" name="nueva_fecha" id="nueva_fecha" class="form-control" value="<?php echo $producto['Fecha']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nueva_Imagen" class="form-label">Nueva Imagen</label>
                                            <input type="file" name="nueva_Imagen" id="nueva_Imagen" class="form-control" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="nuevo_Precio" class="form-label">Nuevo Precio</label>
                                            <input type="text" name="nuevo_Precio" id="nuevo_Precio" class="form-control" value="<?php echo $producto['Precio']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </form>
                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <style>
                /* Estilo del fondo de pantalla */
                body {
                    background-image: url("./Fotoicon/13416129_5243845.jpg");
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
</body>

</html>