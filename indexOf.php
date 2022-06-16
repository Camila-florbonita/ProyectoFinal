<?PHP

session_start();

include "database.php";



    $query = "SELECT * from productos WHERE precio_oferta != 0";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 

echo "<div class='elemento' id='elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
<img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
<p class='labelElemento'>",
    $registro['nombre_producto'],
"</p>
<p class='labelPrecio'>",
    $registro['precio'],
"</p>
</div>";
$cont++;
}

if($cont == 0)
{
  echo "<div class='elemento' id='elementoOf'>
  <p class='labelElemento'>
  No hay ofertas por ahora
  </p>
  </div>";
}


?>
 
