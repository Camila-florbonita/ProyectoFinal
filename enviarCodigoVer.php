<?php

// session_start();

include "database.php";

// $id_usuario = $_SESSION['id_us'];
// $id_name = $_SESSION['id_name'];
// $dato = "SELECT correo_electronico FROM usuarios WHERE id_usuario = '$id_usuario'";
// $dato = "SELECT nombre_usuario FROM usuarios WHERE id_usuario = '$id_usuario'";
// $resname = mysqli_query($conexion, $dato);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cadivie.ecommerce@gmail.com';                     //SMTP username
    $mail->Password   = 'mxvbuawjkymnzpnb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('a18300421@ceti.mx', 'Cadivie');
    $mail->addAddress($correo_electronico, $nombre_usuario);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Verificacion de correo Cadivie';

    $cuerpo = '<h4>Este es su codigo de verificacion</h4>';
    $cuerpo .= '<p><b>' . $codigo . '</b></p>';

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Favor de ingresar su codigo de verificacion en la pagina de registro de Cadivie';

    $mail->setLanguage('es', '/phpmailer/language/phpmailer.lang-es.php');
    
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Se ha producido un error al enviar el correo de verificacion de correo: {$mail->ErrorInfo}";
}