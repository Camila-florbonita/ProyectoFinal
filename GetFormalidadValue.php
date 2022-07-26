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
        switch($registro2["formalidad"])
        {
            case "casual": $formalidadValue = 0;
            break;
            case "formal": $formalidadValue = 1;
            break;
            case "semiformal": $formalidadValue = .7;
            break;
        }


        $suma = $suma + $formalidadValue;

$cont++;
}

$total = $suma/$cont;


$_SESSION["fromalidadValue"] = $total;

?>
