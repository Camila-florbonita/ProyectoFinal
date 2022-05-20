
<?PHP

$nombre_usuario = $_POST["nombre"];
$correo_electronico = $_POST["email"];
$password =  $_POST["password"];

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$ingreso = "INSERT into usuarios (nombre_usuario, correo_electronico, password) VALUES ('$nombre_usuario','$correo_electronico','$password')";
mysqli_query($conexion, $ingreso);

header("Location: login.html")
?>

