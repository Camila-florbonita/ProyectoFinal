
<?PHP

$nombre_usuario = $_POST["nombre"];
$correo_electronico = $_POST["email"];
$password =  $_POST["password"];

include "database.php";
$ingreso = "INSERT into usuarios (nombre_usuario, correo_electronico, password) VALUES ('$nombre_usuario','$correo_electronico','$password')";
mysqli_query($conexion, $ingreso);

header("Location: login.html")
?>

