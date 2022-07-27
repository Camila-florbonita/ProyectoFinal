<?PHP

include "database.php";
$id_us = $_SESSION["id_us"];
$suma = 0;

    $query = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

$cont = 0;
while ($registro = mysqli_fetch_array($result)){ 
    $id_prenda = $registro['id_producto'];
    $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
    $result2 = mysqli_query($conexion, $query2); 
    $registro2 = mysqli_fetch_array($result2);
    switch($registro2["edad"])
    {
        case "nino": $edadValue = 0;
        break;
        case "adulto": $edadValue = 1;
        break;
        case "joven": $edadValue = .5;
        break;
    }  
    $suma = $suma + $edadValue;
    $cont++;
    
}

if($cont != 0){
$total = $suma/$cont;
}


$_SESSION["edadValue"] = $total;


?>
