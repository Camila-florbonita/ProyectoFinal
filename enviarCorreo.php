<?php

session_start();

include "database.php";

$id_usuario = $_SESSION['id_us'];
$id_name = $_SESSION['id_name'];
$dato = "SELECT correo_electronico FROM usuarios WHERE id_usuario = '$id_usuario'";
$dato = "SELECT nombre_usuario FROM usuarios WHERE id_usuario = '$id_usuario'";
$resname = mysqli_query($conexion, $dato);

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
    $mail->addAddress($id_usuario, $id_name);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recibo de compra en Cadivie';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= 'El ID de su compra es <b>' . $id_transaccion . '</b></p>';

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Detalles de su compra';

    $mail->setLanguage('es', '/phpmailer/language/phpmailer.lang-es.php');
    
    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Se ha producido un error al enviar el correo del recibo de la compra: {$mail->ErrorInfo}";
}