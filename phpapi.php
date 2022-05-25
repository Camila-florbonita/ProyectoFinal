<?PHP

session_start();

include "database.php";
$id = $_SESSION['id_p'];

    $query = "SELECT * from productos WHERE id_producto = '$id'";     // Esta linea hace la consulta
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result)){ 
        echo $registro['precio'];
}

?>