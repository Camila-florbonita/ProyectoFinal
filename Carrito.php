
<?PHP

session_start();

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$totalCarrito = 0;

$id_us = 1;

    $query = "SELECT * from carrito WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);

echo "<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
<img class='imagenprenda' src='ImagenesPrendas/", $registro2['id_producto'], ".jpg'>
<p class='nomprodcarrito' id='NombreProducto'>",
    $registro2['nombre_producto'],
"</p>
<p class='precprodcarrito'>",
    $registro2['precio'],
"</p>
<p class='descprodcarrito'>",
"",
"</p>
</div>";
$cont++;
$totalCarrito = $totalCarrito + $registro2['precio'];
}

if($cont == 0)
{
  echo "<div class='producto' id='producto'>
  <p class='precprodcarrito'>
  No se tienen productos en el carrito
  </p>
  </div>";
}

$_SESSION["totalCarrito"] = $totalCarrito;


?>
 