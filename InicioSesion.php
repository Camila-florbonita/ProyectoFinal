<?PHP

session_start();

$correo_electronico = $_POST["email"];
$password =  $_POST["password"];

include "database.php";
$dato = "SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico'";
$resname = mysqli_query($conexion, $dato);
if(!($registro = mysqli_fetch_array($resname)))
{
    echo "<script type='text/javascript'>alert('No existe una cuenta con ese correo');</script>";
    //header("Location: registro.html");
    
}
else
{
    $coincidename = $registro["correo_electronico"];
    $datopass = $registro["password"];
    
if($coincidename == $correo_electronico && $datopass == $password)
{
    $_SESSION["id_us"] = $registro['id_usuario'];
    echo $_SESSION["id_us"];
    header("Location: InicioConCuenta.html");
}
else
{
    header("Location: login.html");
}
}

?>

