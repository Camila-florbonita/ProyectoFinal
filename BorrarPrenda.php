
<?PHP

include "database.php";

$borrar = "DELETE FROM productos WHERE id_producto = 23";
mysqli_query($conexion, $borrar);

$query = "SELECT id_producto from productos ORDER BY id_producto DESC LIMIT 1";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);
$idProducto = $registro['id_producto'];

//$ingresoTallas = "INSERT into tallas (id_producto, XS, S, M, L, XL) VALUES ('$idProducto', '$TXS', '$TS', '$TM', '$TL', '$TXL')";
//mysqli_query($conexion, $ingresoTallas);

header("Location: EditarPrenda.html");
?>

