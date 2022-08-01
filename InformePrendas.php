<?PHP

session_start();

include "database.php";

$query2 = "SELECT * from productos";
$result2 = mysqli_query($conexion, $query2); 

while ($registro2 = mysqli_fetch_array($result2)){
$id_prenda = $registro2['id_producto'];
$query = "SELECT COUNT(*) AS cuenta FROM comprado WHERE fecha >= CURRENT_DATE() - INTERVAL 1 month
AND id_producto = '$id_prenda'";
$result = mysqli_query($conexion, $query);
$registro = mysqli_fetch_array($result);

$queryP = "SELECT COUNT(*) AS cuenta FROM comprado WHERE fecha >= CURRENT_DATE() - INTERVAL 2 month
AND fecha <= CURRENT_DATE() - INTERVAL 1 month AND id_producto = '$id_prenda'";
$resultP = mysqli_query($conexion, $queryP);
$registroP = mysqli_fetch_array($resultP);

echo "
<div class='producto' id='producto'>
<div class='infoProduct'>
<p class='product-name'>",
    $registro2['nombre_producto'],
"</p>
<p class='price product-price'>",
    $registro2['id_producto'],
    "</p>";
    
if($registro['cuenta'] != 0)
{
    if($registro['cuenta'] > 10)
    {
        $popularidad = "popular";
    }
    else
    {
        $popularidad = "poco popular";
    }
    if($registro['cuenta'] < $registroP['cuenta'])
    {
        $mp = "menos";
        $g = "perdiendo";
    }
    else
    {
        $mp = "mas";
        $g = "ganando";
    }

    echo "<p class='product-description'>
    Este producto ha sido vendido: ",
    $registro['cuenta'],
    " veces durante el ultimo mes lo que significa que es ",
    $popularidad,
    ",se vendio ",
    $mp,
    " que el mes pasado y esta ",
    $g,
    " popularidad</p>";
    
}
else
{
    echo "<p class='product-description'>
    Este producto no se vendio durante el ultimo mes, 
    lo que significa que no es popular
    </p>";
}

echo "</div>         
     </div>";
}


?>