
<?PHP

session_start();

$id_usuario = $_SESSION["id_us"];
echo $id_usuario;
$comentario =  $_POST["comentario"];
$id_p = $_SESSION["id_p"];

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$ingreso = "INSERT into comentarios (id_usuario, id_producto, comentario) VALUES ('$id_usuario','$id_p','$comentario')";
mysqli_query($conexion, $ingreso);

//header("Location: ProductoConCuenta.html");
?>

