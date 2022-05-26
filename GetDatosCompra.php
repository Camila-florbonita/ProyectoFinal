<?php

// session_start();
include "database.php";
// $id_us = $_SESSION["id_us"];

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

if(is_array($datos))
{
    $id_transaccion = $datos['detalles']['id'];
    $precio = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $estado = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_db = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    $ingreso = "INSERT into comprado (id_transaccion, estado, email, id_cliente, precio, fecha_historial) VALUES ('$id_transaccion', '$estado', '$email', '$id_cliente', '$precio',
    '$fecha_db')";
    mysqli_query($conexion, $ingreso);
}


?>