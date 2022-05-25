<?PHP

session_start();

include "database.php";
$id_us = 1;
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

print_r($colores);
$sortColores = array_count_values($colores);
echo "<br>";
print_r($sortColores);
echo "<br>";
arsort($sortColores);
print_r($sortColores);
echo "<br>";
$colorArr = array_keys($sortColores);
print_r($colorArr);
echo "<br>";
$color = $colorArr[0];
echo $color;

$_SESSION["color"] = $color;

header("Location: GetMaterialValue.php");


?>
 
