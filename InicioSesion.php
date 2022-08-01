<?PHP

session_start();

$correo_electronico = $_POST["email"];
$password =  $_POST["password"];
// $password =  sha1($_POST["password"]);

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
    
    if($correo_electronico == "cadivie.ecommerce@gmail.com" && $password == $datopass)
    {
        $_SESSION["id_us"] = $registro['id_usuario'];
    $_SESSION["id_name"] = $registro['nombre_usuario'];
    $_SESSION["id_email"] = $registro['correo_electronico'];
        header("Location: OpcionesAdministrador.html");
        
    }
    else{
if($coincidename == $correo_electronico && $datopass == $password)
{
    $_SESSION["id_us"] = $registro['id_usuario'];
    $_SESSION["id_name"] = $registro['nombre_usuario'];
    $_SESSION["id_email"] = $registro['correo_electronico'];
    echo $_SESSION["id_us"];
    header("Location: InicioConCuenta.html");
}
else
{
    echo "<script type='text/javascript'>alert('Contraseña incorrecta');</script>";
    header("Location: login.html");
}
}
}

?>

