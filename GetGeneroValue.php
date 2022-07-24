<?PHP

include "database.php";
$id_us = 1;
$suma = 0;

    $query = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);
        switch($registro2["genero"])
        {
            case "femenino": $generoValue = 0;
            break;
            case "masculino": $generoValue = 1;
            break;
            case "unisex": $generoValue = .5;
            break;
        }

        $suma = $suma + $generoValue;
$cont++;
}

$total = $suma/$cont;

$_SESSION["generoValue"] = $total;

?>
