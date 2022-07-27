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
        switch($registro2["estilo"])
        {
            case "clasico": $estiloValue = .55;
            break;
            case "vintage": $estiloValue = .65;
            break;
            case "gotico": $estiloValue = .25;
            break;
            case "preppy": $estiloValue = .70;
            break;
            case "urbano": $estiloValue = .15;
            break;
            case "hipster": $estiloValue = .60;
            break;
            case "grunge": $estiloValue = .20;
            break;
            case "natural": $estiloValue = .50;
            break;
            case "sofisticado": $estiloValue = .75;
            break;
            case "artsy": $estiloValue = .35;
            break;
            case "vanguardista": $estiloValue = .90;
            break;
            case "boho": $estiloValue = .85;
            break;
            case "romantico": $estiloValue = .45;
            break;
            case "dramatico": $estiloValue = .80;
            break;
            case "girly": $estiloValue = .40;
            break;
        }

        $suma = $suma + $estiloValue;
$cont++;

}

if($cont != 0){
    $total = $suma/$cont;
    }
$_SESSION["estiloValue"] = $total;

?>
 
