
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
    // $password = sha1($_POST['password']); // esto es para encriptar pero no ahorita
    $email_bd = "SELECT correo_electronico FROM verificar WHERE correo_electronico = '$correo_electronico' AND status = 1";
    $result = mysqli_query($conexion, $email_bd);
    
    if ( !(mysqli_num_rows($result) > 0))
    {
        do {
            $abc = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
            $codigo = rand(1000,9999);
            $r = rand(1, 27);
            $letra1 = $abc[$r - 1];
            $r = rand(1, 27);
            $letra2 = $abc[$r - 1];
            $codigo = $codigo.$letra1.$letra2;
            // $codigo = '7790sr';
                
            $check_code = "SELECT * FROM verificar WHERE codigo = '$codigo'";
            $code_result = mysqli_query($conexion, $check_code);
        } while (mysqli_num_rows($code_result) > 0);

        include 'enviarCodigoVer.php';

        $check_status = "SELECT correo_electronico FROM verificar WHERE correo_electronico = '$correo_electronico' AND status = 0";
        $res = mysqli_query($conexion, $check_status);
        if (mysqli_num_rows($res) > 0)
        {
            $set_code = "UPDATE verificar SET codigo = '$codigo', nombre_usuario = '$nombre_usuario', password = '$password' WHERE correo_electronico = '$correo_electronico'";
            mysqli_query($conexion, $set_code);
        }
        else
        {
            $ingreso = "INSERT into verificar (nombre_usuario, correo_electronico, password, codigo, status) VALUES ('$nombre_usuario','$correo_electronico','$password','$codigo',0)";
            mysqli_query($conexion, $ingreso);
        }
        // do {
        //     include 'GenerarCodigo.html';
        //     $codigo_bd = "SELECT codigo FROM verificar WHERE codigo = '$codigo_bd'";
        // } while ($codigo != $codigo_bd);
        // include 'mail.php';
        // $verificar = "INSERT into verificar (codigo, correo_electronico, status) VALUES ('$codigo','$correo_electronico',0)";
        // include 'enviarCodigoVer.php';
        
        
        
        echo "<script> window.location.href = 'VerificarCorreo.php?correo_electronico=$correo_electronico' </script>"; 
        // header("CodigoVerificacion.html?correo_electronico=$correo_electronico");
    }
    else
    {
        echo "<script> alert('El correo ya ha sido registrado') </script>"; 
        echo "<script> window.location.href = 'registro.html' </script>"; 
    }
    

}

?>

