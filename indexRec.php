<?PHP

session_start();

include "database.php";
$query = "SELECT *, COUNT(*) FROM comprado INNER JOIN productos 
ON productos.id_producto = comprado.id_producto 
WHERE comprado.fecha > CURRENT_DATE() - INTERVAL 1 month GROUP BY comprado.id_producto 
ORDER BY COUNT(*) DESC LIMIT 10;";
$result = mysqli_query($conexion, $query); 

$cont = 0;
while ($registro = mysqli_fetch_array($result)){ 
    echo "<div class='elemento' id='elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
    <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
    <p class='labelElemento'>",
    $registro['nombre_producto'],
    "</p>";
    
    if($registro['precio_oferta'] == 0)
    {
        echo "<p class='labelPrecio'>",
        $registro['precio'],
        "</p>";
    }
    else
    {
        echo "<p class='labelPrecio'>",
        $registro['precio_oferta'],
        "</p>";
    }

    echo "</div>";
    $cont++;
}

if($cont == 0)
{
    echo "<div class='producto' id='producto'>
    <p class='precprodcarrito'>
    No ha habido compras aún :(
    </p>
    </div>";
}


?>