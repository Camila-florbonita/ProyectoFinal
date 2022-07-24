<?php

session_start();
include "database.php";
$id_us = $_SESSION["id_us"];
$id_producto = $_SESSION['id_p'];

// $x = $_REQUEST["amount"];

// echo $x;

$json = file_get_contents('php://input');
echo "<script> alert('$json') </script>"; 
echo $json;
$datos = json_decode($json, true);
echo "<script> alert('$datos') </script>"; 
echo $datos;

if(is_array($datos))
{
    $id_transaccion = $datos['detalles']['id'];
    $precio = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $estado = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_db = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    // $ingreso = "INSERT INTO comprado (id_usuario, id_producto, id_transaccion, estado, email, id_cliente, precio, fecha_historial) VALUES ('$id_us', '$id_producto', '$id_transaccion', '$estado', '$email', '$id_cliente', '$precio',
    // '$fecha_db')";
    echo "<script> alert('$id_us') </script>"; 
    echo "<script> alert('$id_producto') </script>"; 
    echo "<script> alert('$id_transaccion') </script>"; 
    echo "<script> alert('$estado') </script>"; 
    echo "<script> alert('$email') </script>"; 
    echo "<script> alert('$id_cliente') </script>"; 
    echo "<script> alert('$precio') </script>"; 
    echo "<script> alert('$fecha_db') </script>"; 
    echo $id_us; 
    echo $id_producto;
    echo $id_transaccion;
    echo $estado;
    echo $email;
    echo $id_cliente;
    echo $precio;
    echo $fecha_db;

    $ingreso = "INSERT INTO comprado (id_usuario, id_producto, id_transaccion, estado, email, id_cliente, precio, fecha_historial) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // $sql->execute([$id_us, $id_producto, $id_transaccion, $estado, $email, $id_cliente, $precio, $fecha_db]);
    $sql->execute(['1', '4', '1234abcd', 'SUCCESFUL', 'fotosdecamilarock67@gmail.com', 'abcd1234', 239, '2022-15-06 00:00:00']);
    
    $id_historial = $con->lastInsertId();
    // mysqli_query($conexion, $ingreso);
}


?>