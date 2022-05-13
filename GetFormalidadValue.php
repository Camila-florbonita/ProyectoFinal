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
        switch($registro2["formalidad"])
        {
            case "casual": $formalidadValue = 0;
            break;
            case "formal": $formalidadValue = 1;
            break;
            case "semiformal": $formalidadValue = .7;
            break;
        }

        echo $formalidadValue, "<br>";
        
        $suma = $suma + $formalidadValue;
        echo $suma, "<br>";
$cont++;
}

echo $suma, "<br>";
echo $cont, "<br>";
$total = $suma/$cont;
echo $total;

$_SESSION["fromalidadValue"] = $total;

header("Location: GetGeneroValue.php");

?>
