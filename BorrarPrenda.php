
<?PHP

include "database.php";

$idProducto = $_REQUEST['idp'];



$borrar = "DELETE FROM calificacion WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM carrito WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM comentarios WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM comprado WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM listadedeseos WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM ofertas WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM tallas WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

$borrar = "DELETE FROM productos WHERE id_producto = '$idProducto'";
mysqli_query($conexion, $borrar);

header("Location: OpcionesAdministrador.html")

?>

