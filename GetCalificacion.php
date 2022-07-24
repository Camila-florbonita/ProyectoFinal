<?PHP

session_start();
$id_usuario = $_SESSION["id_us"];
$id_p = $_SESSION["id_p"];

include "database.php";

$query = "SELECT * from calificacion WHERE id_usuario = '$id_us' AND id_producto = '$id_p'";
$result = mysqli_query($conexion, $query); 
if ($registro = mysqli_fetch_array($result))
{
    echo $registro["calificacion"];
}
else
{
    echo 0;
}

?>

