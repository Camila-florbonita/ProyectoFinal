
<?PHP

session_start();

$id_p = $_SESSION["id_p"];
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
$precio = $_POST["precio"];
$TXS = $_POST["nxs"];
$TS = $_POST["ns"];
$TM = $_POST["nm"];
$TL = $_POST["nl"];
$TXL = $_POST["nxl"];

include "database.php";


$ingreso = "UPDATE productos SET nombre_producto = '$nombreprenda', genero = '$genero', estilo = '$estilo', 
edad = '$edad', color = '$color', tipo_prenda = '$tipodeprenda', temporada = '$temporada', ocasion = '$ocasion', 
formalidad = '$formalidad', material = '$material', precio = '$precio' WHERE id_producto = '$id_p'";
mysqli_query($conexion, $ingreso);

$query = "SELECT * from tallas WHERE id_producto = '$id_p'";
$result = mysqli_query($conexion, $query); 
if($registro = mysqli_fetch_array($result))
{
    $ingresoTallas = "UPDATE  tallas SET XS = '$TXS', S = '$TS', M = '$TM', L = '$TL', XL = '$TXL' WHERE id_producto = '$id_p'";
}
else
{
    $ingresoTallas = "INSERT into tallas (id_producto, XS, S, M, L, XL) VALUES ('$id_p', '$TXS', '$TS', '$TM', '$TL', '$TXL')";
}
mysqli_query($conexion, $ingresoTallas);


header("Location: OpcionesAdministrador.html");
?>

