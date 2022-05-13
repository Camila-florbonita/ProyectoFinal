<?PHP

session_start();

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

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

        echo $materialValue, "<br>";
        
        $suma = $suma + $materialValue;
        echo $suma, "<br>";
$cont++;
}

echo $suma, "<br>";
echo $cont, "<br>";
$total = $suma/$cont;
echo $total;

$_SESSION["materialValue"] = $total;

header("Location: GetTemporadaValue.php");
?>