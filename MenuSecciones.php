
<?PHP

session_start();

include "database.php";
$seccion = $_SESSION["secc"];

    $query = "SELECT * from productos WHERE estilo = '$seccion'
    OR tipo_prenda = '$seccion'
    OR temporada = '$seccion'
    OR ocasion = '$seccion'";     // Esta linea hace la consulta
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 


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
}

if($cont == 0)
{
  echo "<div class='producto' id='producto'>
  <p class='precprodcarrito'>
  No hay coincidencias para esa busqueda
  </p>
  </div>";
}


?>

