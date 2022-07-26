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
        switch($registro2["material"])
        {
            case "algodon": $materialValue = 0;
            break;
            case "poliester": $materialValue = .8;
            break;
            case "lana": $materialValue = .1;
            break;
            case "seda": $materialValue = .3;
            break;
            case "cuero": $materialValue = 1;
            break;
            case "mezclilla": $materialValue = .9;
            break;
            case "licra": $materialValue = .7;
            break;
            case "lino": $materialValue = .2;
            break;
        }


        $suma = $suma + $materialValue;

$cont++;
}

$total = $suma/$cont;

$_SESSION["materialValue"] = $total;


?>