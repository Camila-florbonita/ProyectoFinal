<?PHP

include "database.php";
$id_us = $_SESSION["id_us"];
$suma = 0;
$colores = [];

    $query = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);
        $colores[] = $registro2["color"];
        
$cont++;

}


$sortColores = array_count_values($colores);

arsort($sortColores);
$colorArr = array_keys($sortColores);;
$color = $colorArr[0];

$_SESSION["color"] = $color;

?>
 
