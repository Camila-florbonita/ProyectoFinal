<?PHP
session_start();

$id_us = $_SESSION["id_us"];
$direccion = $_POST["direccion"];
$n_ext = $_POST["nexterior"];
$n_int = $_POST["ninterior"];
$tel =  $_POST["telefono"];
$CP = $_POST["cpostal"];
$estado = $_POST["estado"];
$municipio = $_POST["municipio"];
$instrucciones = $_POST["insdeentrega"];
$nombre = $_POST["nombre"];

include "database.php";

$ingreso = "UPDATE entrega SET direccion = '$direccion', n_ext = '$n_ext', n_int = '$n_int', telefono = '$tel', 
cp = '$CP', estado = '$estado', municipio = '$municipio', instentrega = '$instrucciones' WHERE id_usuario = '$id_us'";
mysqli_query($conexion, $ingreso);

$ingreso2 = "UPDATE usuarios SET nombre_usuario = '$nombre' WHERE id_usuario = '$id_us'";
mysqli_query($conexion, $ingreso2);

header("Location: ConfiguracionCuenta.html");
?>