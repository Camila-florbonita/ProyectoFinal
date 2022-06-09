
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
    include 'enviarCodigoVer.php';
    $verify = "SELECT correo_electronico FROM verificar WHERE correo_electronico = '$correo_electronico'";
    if ($verify != $correo_electronico)
    {
        $_SESSION["verifyEmail"] = $correo_electronico;
        
        include 'CodigoVerificacion.php';
    }
    else
    {
        echo "<script> alert('El correo ya ha sido registrado') </script>"; 
        echo "<script> window.location.href = 'registro.html' </script>"; 
    }
    

}

?>

