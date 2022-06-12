<?PHP
header("Location: CodigoVerificacion.html");
session_start();
include "database.php";

$verifyEmail = $_SESSION['verifyEmail'];

$codigo = $_POST["verifyCode"];
$codigo_db = "SELECT codigo FROM verificar WHERE correo_electronico = '$verifyEmail'";

// echo "<script> alert('codigo: $codigo') </script>"; 
// echo "<script> alert('codigo: $codigo_db') </script>"; 

if ($codigo_db == $codigo)
{
    $ingreso = "INSERT into usuarios (nombre_usuario, correo_electronico, password) VALUES ('$nombre_usuario','$correo_electronico','$password')";
    mysqli_query($conexion, $ingreso);
    echo "<script> alert('El codigo de verificacion es incorrecto') </script>"; 
    header("Location: login.html");
}
else
    {
        echo "<script> alert('El codigo de verificacion es incorrecto') </script>"; 
        echo "<script> window.location.href = 'CodigoVerificacion.html' </script>"; 
    }

?>