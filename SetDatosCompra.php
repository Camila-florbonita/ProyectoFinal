<?php

session_start();
include "database.php";
$id_us = $_SESSION["id_us"];
$id_producto = $_SESSION['id_p'];
$prc = $_SESSION['precio'];
$talla = $_SESSION['talla'];
$np = $_SESSION['nprendas'];
$id_transaccion = $_REQUEST['id_t'];
$_email = $_REQUEST['email'];
$id_cliente = $_REQUEST['id_c'];
$estado = $_REQUEST['status'];
$fecha = $_REQUEST['fecha'];

$fecha_db = date('Y-m-d', strtotime($fecha));

echo $id_producto;
echo"<br>";
echo $_SESSION['talla'];

$query = "SELECT * from tallas WHERE id_producto = '$id_producto'";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);

echo $registro["M"];

$tallas = $registro["$talla"];
$newTalla = $tallas;

for($cont = 0; $cont < $np; $cont++)
{
    $ingreso = "INSERT INTO `comprado`(`id_usuario`, `id_producto`, `fecha`, `id_transaccion`, `email`, `id_cliente`, `precio`, `talla`) 
    VALUES ('$id_us', '$id_producto','$fecha_db','$id_transaccion','$_email','$id_cliente','$prc', '$talla')";
    $newTalla = $newTalla - 1;
    echo $newTalla;
    echo $talla;
    $update = "UPDATE tallas SET $talla = '$newTalla' WHERE id_producto = '$id_producto'";
    mysqli_query($conexion, $ingreso);
    mysqli_query($conexion, $update);
}

$queryLiq = "SELECT * from tallas WHERE id_producto = '$id_producto'";
$resultLiq = mysqli_query($conexion, $queryLiq); 
$registroLiq = mysqli_fetch_array($resultLiq);
if($registroLiq['XS'] == 0 && $registroLiq['S'] == 0 && $registroLiq['M'] == 0 && $registroLiq['L'] == 0 && $registroLiq['XL'] == 0)
{
    $queryOf = "SELECT * from ofertas WHERE id_producto = '$id_producto'";
    $resultOf = mysqli_query($conexion, $queryOf); 
    if($registroOf = mysqli_fetch_array($resultOf))
    {
        if($registroOf['fin'] == "0000-00-00")
        {
            $deletion = "DELETE FROM ofertas WHERE id_producto = '$id_producto'";
            $updation = "UPDATE productos SET precio_oferta = 0 WHERE id_producto = '$id_producto'";
            mysqli_query($conexion, $deletion);
            mysqli_query($conexion, $updation);
        }
    }
}

header("Location: InicioConCuenta.html");

?>