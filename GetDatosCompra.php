<?php

session_start();
include "database.php";
$id_us = $_SESSION["id_us"];
$id_producto = $_SESSION['id_p'];
$prc = $_SESSION['precio'];
$talla = $_SESSION['talla'];
$np = $_SESSION['nprendas'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $json = file_get_contents('php://input');
    $datos = json_decode($json);

    if($json != NULL)
    {
        $str = "{datos:  2}";
        
        echo $str;
        $id_transaccion = $datos->detalles->id;
        echo $id_transaccion;
        $precio = floatval($datos->detalles->purchase_units);
        // var_dump($datos);
        $estado = $datos->detalles->status;
        $fecha = $datos->detalles->update_time;
        $fecha_db = date('Y-m-d', strtotime($fecha));
        $_email = $datos->detalles->payer->email_address;
        $id_cliente = $datos->detalles->payer->payer_id;

        

        $query = "SELECT * from tallas WHERE id_producto = '$id_producto'";
        $result = mysqli_query($conexion, $query); 
        $registro = mysqli_fetch_array($result);
        $tallas = $registro["$talla"];
    
        for($cont = 0; $cont <= 5; $cont++)
        {
            $ingreso = "INSERT INTO `comprado`(`id_usuario`, `id_producto`, `fecha`, `id_transaccion`, `email`, `id_cliente`, `precio`, `talla`) 
            VALUES ('$id_us', '$id_producto','$fecha_db','$id_transaccion','$_email','$id_cliente','$prc', '$talla')";
            $newTalla = $tallas - 1;
            $update = "UPDATE tallas SET '$talla' = '$newTalla' WHERE id_producto = '$id_producto'";
            mysqli_query($conexion, $ingreso);
            mysqli_query($conexion, $update);
        }
    }else {
        echo $json;
    }
}
?>