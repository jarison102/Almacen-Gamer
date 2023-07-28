
<?php
// Inicia la sesión. Permite usar variables de sesión para mantener información entre páginas.
session_start();

// Comprueba si se ha enviado un formulario usando el método POST.
if ($_POST) {

    // Comprueba si los valores enviados coinciden con los valores esperados para el correo y el nombre.
    if ($_POST['Correo'] == "Jarimices@gmail.com" && $_POST['Nombre'] == "Jarison") {

        // Si las condiciones son verdaderas, establece una variable de sesión llamada 'Correo' con el valor "Jarimices@gmail.com".
        $_SESSION['Correo'] = "Jarimices@gmail.com";

        // Redirige al usuario a la página 'index.php' después de establecer la variable de sesión.
        header("location: index.php");
    } else {
        // Si los valores enviados no coinciden con los esperados, muestra una alerta en el navegador con el mensaje "Usuario Datos incorrectos".
        echo "<script>alert('Usuario Datos incorrectos');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./Fotoicon/incognito.svg" rel ="icon">
    <title>Login</title>
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
                                    Login
                                </div>
                                <div class="card-body">
                                    <form action="login.php" method="post">
                                        <br>
                                        Ingresa el correo:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarimices@gmail.com" name="Correo">
                                        <br>
                                        Ingresa tu Nombre:
                                        <br>
                                        <input type="text" class="form-control" placeholder="Jarison" name="Nombre">
                                        <br>
                                        <input type="submit" value="Entrar" class="btn btn-success">

                                    </form>
                                    <form action="./Registrar.php">
                                        <br>
                                        <input type="submit" value="Registrarse" class="btn btn-warning">
                                    </form>

                                </div>
                                <div class="card-footer text-muted">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

</body>
<style>
        body {
            /* Establece el GIF como fondo de pantalla */
            background-image: url("./Fotoicon/12953630_Data_security_27.jpg");
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>