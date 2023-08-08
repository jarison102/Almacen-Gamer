<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // Configuración del servidor y autenticación
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'jarimices@gmail.com'; // Cambia esto por tu dirección de correo
    $mail->Password   = 'hlhravfdbvgmsahu'; // Cambia esto por tu contraseña de correo
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Configuración del remitente y destinatario
    $mail->setFrom('jarimices@gmail.com', 'jarison');
    $mail->addAddress('maricesalma35@gmail.com', 'mari');
    $mail->addAddress('xfabiox19@gmail.com', 'TK STIVUR');
    $mail->addAddress('jarimices@gmail.com', 'jarison');
    $mail->addAddress('daivaison@gmail.com', 'Daivison');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Hack EEtico';
    $mail->Body    = 'SSKLT. ';

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado exitosamente';
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
