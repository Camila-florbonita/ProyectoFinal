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

        echo $edadValue, "<br>";
        
        $suma = $suma + $edadValue;
        echo $suma, "<br>";
$cont++;
}

echo $suma, "<br>";
echo $cont, "<br>";
$total = $suma/$cont;
echo $total;

$_SESSION["edadValue"] = $total;

header("Location: GetEstiloValue.php");

?>
