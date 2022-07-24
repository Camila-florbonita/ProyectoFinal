<?PHP

session_start();
include "database.php";
$verifyCode = $_POST["verifyCode"];
$correo_electronico = $_REQUEST["correo_electronico"];

// if (isset($_GET['correo_electronico']))
// {
    // $correo_electronico = $_GET['correo_electronico'];
    $query = "SELECT * FROM verificar WHERE codigo = '$verifyCode' AND correo_electronico = '$correo_electronico'";
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) > 0)
    {
        // echo "<script> alert(".mysqli_num_rows($result).") </script>";
        $updateData = "UPDATE verificar SET status = 1 WHERE codigo = '$verifyCode'";
        mysqli_query($conexion, $updateData);
        header("Location: login.html");
    }
    else
    {
        echo "<script> alert('Código invalido') </script>";
        echo "<script> window.location.href = 'registro.html' </script>";  
    }
// }
// else
// {
//     echo "<script> alert('Hubo un error') </script>"; 
//     echo "<script> window.location.href = 'registro.html' </script>"; 
// }

// $verifyEmail = $_SESSION['verifyEmail'];

// $codigo = $_POST["verifyCode"];
// $codigo_db = "SELECT codigo FROM verificar WHERE correo_electronico = '$verifyEmail'";

// echo "<script> alert('codigo: $codigo') </script>"; 
// echo "<script> alert('codigo: $codigo_db') </script>"; 

// if ($codigo_db == $codigo)
// {
//     $ingreso = "INSERT into usuarios (nombre_usuario, correo_electronico, password) VALUES ('$nombre_usuario','$correo_electronico','$password')";
//     mysqli_query($conexion, $ingreso);
//     echo "<script> alert('El codigo de verificacion es incorrecto') </script>"; 
//     header("Location: login.html");
// }
// else
//     {
//         echo "<script> alert('El codigo de verificacion es incorrecto') </script>"; 
//         echo "<script> window.location.href = 'CodigoVerificacion.html' </script>"; 
//     }

?>