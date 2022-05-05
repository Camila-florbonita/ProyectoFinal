
<?PHP

$nombreprenda = $_POST["nombreprenda"];
$genero = $_POST["genero"];
$estilo = $_POST["estilo"];
$edad =  $_POST["edad"];
$color =  $_POST["color"];
$tipodeprenda =  $_POST["tipodeprenda"];
$temporada =  $_POST["temporada"];
$ocasion =  $_POST["ocasion"];
$formalidad =  $_POST["formalidad"];
$material =  $_POST["material"];
$corte =  $_POST["corte"];
$precio = $_POST["precio"];
$TXS = $_POST["nxs"];
$TS = $_POST["ns"];
$TM = $_POST["nm"];
$TL = $_POST["nl"];
$TXL = $_POST["nxl"];

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$ingreso = "UPDATE productos SET nombre_producto = '$nombreprenda', genero = '$genero', estilo = '$estilo', 
edad = '$edad', color = '$color', tipo_prenda = '$tipodeprenda', temporada = '$temporada', ocasion = '$ocasion', 
formalidad = '$formalidad', material = '$material', corte = '$corte', precio = '$precio' WHERE id_producto = 23";
mysqli_query($conexion, $ingreso);

$query = "SELECT id_producto from productos ORDER BY id_producto DESC LIMIT 1";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);
$idProducto = $registro['id_producto'];

//$ingresoTallas = "INSERT into tallas (id_producto, XS, S, M, L, XL) VALUES ('$idProducto', '$TXS', '$TS', '$TM', '$TL', '$TXL')";
//mysqli_query($conexion, $ingresoTallas);

header("Location: EditarPrenda.html");
?>

