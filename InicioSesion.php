<?PHP

$correo_electronico = $_POST["email"];
$password =  $_POST["password"];

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$datoname = "SELECT correo_electronico FROM usuarios WHERE correo_electronico = '$correo_electronico'";
$resname = mysqli_query($conexion, $datoname);
$coincidename = $resname->num_rows;

$datopass = "SELECT password FROM usuarios WHERE password = '$password'";
$respass = mysqli_query($conexion, $datopass);
$coincidepass = $respass->num_rows;

if($coincidename > 0 && $coincidepass > 0)
{
    $fila = $resname->fetch_assoc();
    echo htmlentities($fila['correo_electronico']);
    header("Location: InicioConCuenta.html");
}
else
{
    echo $coincidename;
    echo $coincidepass;
}
?>

