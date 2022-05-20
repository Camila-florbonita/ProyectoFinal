<?PHP

session_start();

$correo_electronico = $_POST["email"];
$password =  $_POST["password"];

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$dato = "SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico'";
$resname = mysqli_query($conexion, $dato);
if(!($registro = mysqli_fetch_array($resname)))
{
    echo "<script type='text/javascript'>alert('No existe una cuenta con ese correo');</script>";
    //header("Location: registro.html");
    
}
$coincidename = $registro["correo_electronico"];

$datopass = "SELECT password FROM usuarios WHERE password = '$password'";
$respass = mysqli_query($conexion, $datopass);
$coincidepass = $respass->num_rows;
$registro = mysqli_fetch_array($respass);

if($coincidename > 0 && $coincidepass > 0)
{
    $fila = $resname->fetch_assoc();
    echo htmlentities($fila['correo_electronico']);
    $_SESSION["id_us"] = $registro['id_usuario'];
    echo $_SESSION["id_us"];
    //header("Location: InicioConCuenta.html");
}
else
{
    //header("Location: login.html");
}
?>

