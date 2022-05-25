<?PHP

session_start();

include "database.php";
$id_us = 1;
$suma = 0;

    $query = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda' AND temporada != ''";
        $result2 = mysqli_query($conexion, $query2); 
        while($registro2 = mysqli_fetch_array($result2)){
        switch($registro2["temporada"])
        {
            case "primavera": $temporadaValue = 1;
            break;
            case "verano": $temporadaValue = .8;
            break;
            case "otono": $temporadaValue = .2;
            break;
            case "invierno": $temporadaValue = 0;
            break;
        }

        echo $temporadaValue, "<br>";
        
        $suma = $suma + $temporadaValue;
        echo $suma, "<br>";
$cont++;
    }
}

echo $suma, "<br>";
echo $cont, "<br>";
$total = $suma/$cont;
echo $total;

$_SESSION["temporadaValue"] = $total;
header("Location: Algoritmo.php");

?>
