
<?PHP

session_start();

include "database.php";
$id_p = $_REQUEST["id"];

    $query = "SELECT * from productos WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 
    $registro = mysqli_fetch_array($result);

    $query2 = "SELECT * from tallas WHERE id_producto = '$id_p'";
    $result2 = mysqli_query($conexion, $query2); 
    $registro2 = mysqli_fetch_array($result2);

echo "<div class='producto' id='producto' onclick='getProductId(", $registro['id_producto'],")'>
<img class='imagenprenda' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
<p class='nomprodcarrito' id='NombreProducto'>",
    $registro['nombre_producto'],
"</p>
<p class='precprodcarrito'>",
    $registro['precio'],
"</p>
<p class='descprodcarrito'>",
"Estilo: ", $registro['estilo'], "<br>",
"Genero: ", $registro['genero'], "<br>",
"Color: ", $registro['color'], "<br>",
"Corte: ", $registro['corte'], "<br>",
"</p>
</div>";
$cont++;


if($cont == 0)
{
  echo "<div class='producto' id='producto'>
  <p class='precprodcarrito'>
  No hay coincidencias para esa busqueda
  </p>
  </div>";
}


?>

