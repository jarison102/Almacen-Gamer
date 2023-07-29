<?php include("conexion.php") ?>

<?php
// editar_producto.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $id = $_POST['id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_Apellido = $_POST['nuevo_Apellido'];
    $nuevo_Pais = $_POST['nuevo_Pais'];
    $nuevo_Telefono = $_POST['nuevo_Telefono'];
    $nuevo_Correo = $_POST['nuevo_Correo'];
    $nuevo_Departamento = $_POST['nuevo_Departamento'];

    // Validar y actualizar el registro en la base de datos
    if (!empty($id) && !empty($nuevo_nombre) && !empty($nuevo_Apellido) && !empty($nuevo_Pais) && !empty($nuevo_Telefono)  && !empty($nuevo_Correo) && !empty($nuevo_Departamento)) {
        $objconexion = new conexion();
        $sql = "UPDATE `registro usuario` SET `Nombre` = '$nuevo_nombre', `Apellido` = '$nuevo_Apellido', `Pais` = '$nuevo_Pais', `Telefono`='$nuevo_Telefono',`Correo`='$nuevo_Correo',`Departamento`='$nuevo_Departamento'  WHERE `id` = $id";
        $objconexion->ejecutar($sql);

        // Redireccionar a la página principal o a donde desees después de actualizar los datos del producto
        header("Location: Registrar.php");
        exit;
    } else {
        // Manejo de errores, si es necesario
        $error_message = "Por favor, completa todos los campos.";
    }
}


// Obtener el ID_DEL_Usuario de la URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $objconexion = new conexion();
    $sql = "SELECT * FROM `registro usuario` WHERE `id` = $id";
    $resultado = $objconexion->consultar($sql);
    $producto = $resultado[0];
} else {
    // Redireccionar a la página principal o mostrar un mensaje de error si no se proporciona el ID_DEL_Usuario
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
    <title>Editar Persona</title>
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
                                    <h1>Editar Persona</h1>
                                    <form action="editar_Persona.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                        <div class="mb-3">
                                            <label for="nuevo_nombre" class="form-label">Modificar Nombre </label>
                                            <input type="text" name="nuevo_nombre" id="nuevo_nombre" class="form-control" value="<?php echo $producto['Nombre']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nuevo_Apellido" class="form-label">Modificar Apellido</label>
                                            <input type="text" name="nuevo_Apellido" id="nuevo_Apellido" class="form-control" value="<?php echo $producto['Apellido']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nuevo_Pais" class="form-label">Modificar Pais</label>
                                            <input type="text" name="nuevo_Pais" id="nuevo_Pais" class="form-control" value="<?php echo $producto['Pais']; ?>" oninput="actualizarDepartamentos()" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nuevo_Telefono" class="form-label">Modificar Telefono</label>
                                            <input type="text" name="nuevo_Telefono" id="nuevo_Telefono" class="form-control" value="<?php echo $producto['Telefono']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nuevo_Correo" class="form-label">Modificar Correo</label>
                                            <input type="text" name="nuevo_Correo" id="nuevo_Correo" class="form-control" value="<?php echo $producto['Correo']; ?>" required>
                                        </div>
                                        <label for="nuevo_Departamento">Departamento:</label>
                                        <select id="nuevo_Departamento" name="nuevo_Departamento" class="form-control"value="<?php echo $producto['Departamento']; ?>" required>
                                            <!-- Aquí se llenarán los departamentos automáticamente -->
                                        </select>
                                        <br>
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
<script src="Animacion.js"></script>

</html>