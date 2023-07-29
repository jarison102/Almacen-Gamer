<?php include("conexion.php"); ?>


<?php
if ($_POST) {

    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Pais = $_POST['pais'];
    $departamento = $_POST['departamento'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];

    $objconexion =  new conexion();

    $sql = "INSERT INTO `registro usuario`(`id`, `Nombre`, `Apellido`, `Pais`, `Departamento`,`Telefono`, `Correo`) VALUES (Null,'$Nombre','$Apellido','$Pais','$departamento','$Telefono','$Correo');";

    $objconexion->ejecutar($sql);
}

$objconexion =  new conexion();
$resultado = $objconexion->consultar("SELECT * FROM `registro usuario`");
//print_r($resultado);

if ($_GET) {
    $id = $_GET['borrar'];
    $objconexion = new conexion();
    $sql = "DELETE FROM `registro usuario` WHERE `registro usuario`.`id` = " . $id;
    $objconexion->ejecutar($sql);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./Fotoicon/5146927.png" rel="icon">

    <title>Registro</title>
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
                                        <h1>Registro De Persona</h1>
                                    </center>
                                </div>
                                <div class="card-body">
                                    <form action="Registrar.php" method="post" enctype="multipart/form-data">
                                        <br>
                                        Ingresa Tu Nombre:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarison" name="Nombre" id="Nombre" value="">
                                        <br>
                                        Ingresa Tu Apellido:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Cespedes" name="Apellido" id="Apellido" value="">
                                        <br>
                                        Ingresa Tu Pais:
                                        <br>
                                        <label for="pais">País:</label>
                                        <input type="text" class="form-control" placeholder="Colombia" name="pais" id="pais" value="" oninput="actualizarDepartamentos()" required>
                                        <br>
                                        Ingresa Tu Departamento:
                                        <br>
                                        <label for="departamento">Departamento:</label>
                                        <select id="departamento" name="departamento" class="form-control">
                                            <!-- Aquí se llenarán los departamentos automáticamente -->
                                        </select>   
                                        <br>
                                        Ingresa Tu Telefono:
                                        <br>
                                        <input type="text" class="form-control" placeholder="3216692365" name="Telefono" id="Telefono" value="">
                                        <br>
                                        Ingresa Tu Correo:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarimices@gmail.com" name="Correo" id="Correo" value="">
                                        <br>
                                        <button type="submit" class="btn btn-success">Enviar</button>
                                    </form>
                                    <br>
                                    <form action="./index.php" method="post">
                                        <button type="submit" class="btn btn-success">Volver</button>
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
                body {
                    background-image: url("./Fotoicon/3328013_449230-PG9V0X-419.jpg");
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
            <div class="col-md-6 custom-margin">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Pais</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                                <th scope="col">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado as $registro_persona) { ?>
                                <tr class="">
                                    <td><?php echo $registro_persona['id'] ?></td>
                                    <td><?php echo $registro_persona['Nombre'] ?></td>
                                    <td><?php echo $registro_persona['Apellido'] ?></td>
                                    <td><?php echo $registro_persona['Pais'] ?></td>
                                    <td><?php echo $registro_persona['Departamento'] ?></td>
                                    <td><?php echo $registro_persona['Telefono'] ?></td>
                                    <td><?php echo $registro_persona['Correo'] ?></td>
                                    <td><a href="?borrar=<?php echo $registro_persona['id']; ?>" class="btn btn-danger">Borrar</a></td>
                                    <td><a href="editar_Persona.php?id=<?php echo $registro_persona['id']; ?>" class="btn btn-warning">Editar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="Animacion.js"></script>
</html>