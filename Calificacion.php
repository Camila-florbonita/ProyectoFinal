<?PHP

session_start();

$id_usuario = $_SESSION["id_us"];
echo $id_usuario;
$calificacion =  $_REQUEST["calif"];
$id_p = $_SESSION["id_p"];

include "database.php";

$ingreso = "INSERT into calificacion (id_usuario, id_producto, calificacion) VALUES ('$id_usuario','$id_p','$calificacion')";
mysqli_query($conexion, $ingreso);

header("Location: ProductoConCuenta.html");
?>
