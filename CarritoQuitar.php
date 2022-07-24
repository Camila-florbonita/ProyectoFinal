
<?PHP
session_start();
include "database.php";
$id_prenda = $_REQUEST["id_p"];
$id_us = $_SESSION["id_us"];

$query = "DELETE FROM carrito WHERE id_usuario = '$id_us' AND id_producto = '$id_prenda'";
$result = mysqli_query($conexion, $query); 

?>
 
