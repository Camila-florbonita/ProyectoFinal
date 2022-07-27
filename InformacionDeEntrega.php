<?PHP

$id_us = $_SESSION["id_us"];
$direccion = $_POST["direccion"];
$n_ext = $_POST["nexterior"];
$n_int = $_POST["ninterior"];
$tel =  $_POST["telefono"];
$CP = $_POST["cpostal"];
$estado = $_POST["estado"];
$municipio = $_POST["municipio"];
$instrucciones = $_POST["insdeentrega"];

include "database.php";
$ingreso = "INSERT into entrega (id_usuario, direccion, n_ext, n_int, telefono, cp, estado, municipio, instentrega) 
VALUES ('$id_us','$direccion','$n_ext', '$n_int', '$tel', '$CP', '$estado', '$municipio', '$instrucciones')";
mysqli_query($conexion, $ingreso);

header("Location: ProductoConCuenta.html");
?>

