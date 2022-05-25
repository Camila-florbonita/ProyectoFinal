
<?PHP

session_start();

$id_usuario = $_SESSION["id_us"];
echo $id_usuario;
$comentario =  $_POST["comentario"];
$id_p = $_SESSION["id_p"];

include "database.php";

$ingreso = "INSERT into comentarios (id_usuario, id_producto, comentario) VALUES ('$id_usuario','$id_p','$comentario')";
mysqli_query($conexion, $ingreso);

//header("Location: ProductoConCuenta.html");
?>

