
<?PHP

session_start();
date_default_timezone_set("America/Mexico_City");

$id_us = 1;
$id_pr = $_SESSION['id_p'];
$fecha = date("Y-m-d");

$talla = $_POST["talla"];
//$action = $_REQUEST["action"];
$action = $_POST["botons"];

include "database.php";
$query = "SELECT * from tallas WHERE id_producto = '$id_pr'";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);

if($action == "comprar")
{
$ingreso = "INSERT into comprado (id_usuario, id_producto, fecha, talla) VALUES ('$id_us','$id_pr','$fecha', '$talla')";
mysqli_query($conexion, $ingreso); 
echo $fecha;
}

if($action == "carrito")
{
    $ingreso = "INSERT into carrito (id_usuario, id_producto, talla) VALUES ('$id_us','$id_pr', '$talla')";
    mysqli_query($conexion, $ingreso); 
    echo "carrito";
}

if($action == "listadeseos")
{
    $ingreso = "INSERT into listadedeseos (id_usuario, id_producto) VALUES ('$id_us','$id_pr')";
    mysqli_query($conexion, $ingreso); 
    echo "carrito";
}


?>

