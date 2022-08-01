
<?PHP
session_start();
include "database.php";
$id_hist = $_REQUEST["id_h"];
$id_us = $_SESSION["id_us"];

$query = "DELETE FROM listadedeseos WHERE id_usuario = '$id_us' AND id_listadedeseos = '$id_hist'";
$result = mysqli_query($conexion, $query); 

?>
 
