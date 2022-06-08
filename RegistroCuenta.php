
<?PHP
include "database.php";

$nombre_usuario = $_POST["nombre"];
$correo_electronico = $_POST["email"];
$password =  $_POST["password"];
$password2 = $_POST["verifypassword"];

if ($password != $password2)
{
    // echo "<script> window.alert('Ambas contraseñas no coinciden') </script>";
    echo "<script> alert('Ambas contraseñas no coinciden') </script>"; 
    echo "<script> window.location.href = 'registro.html' </script>"; 
    // header("Location: registro.html");
}
else
{
    $ingreso = "INSERT into usuarios (nombre_usuario, correo_electronico, password) VALUES ('$nombre_usuario','$correo_electronico','$password')";
    mysqli_query($conexion, $ingreso);
    
    header("Location: login.html");

}

?>

