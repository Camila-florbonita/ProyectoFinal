
<?PHP

session_start();
date_default_timezone_set("America/Mexico_City");

$id_us = 1;
$id_pr = $_SESSION['id_p'];
$fecha = date("Y-m-d");
$talla = $_POST["talla"];

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$ingreso = "INSERT into comprado (id_usuario, id_producto, fecha, talla) VALUES ('$id_us','$id_pr','$fecha', '$talla')";
mysqli_query($conexion, $ingreso); 

echo $fecha;

?>

