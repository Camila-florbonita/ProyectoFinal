
<?PHP

session_start();

include "database.php";

$busqueda = $_SESSION["Busqueda"];

    $query = "SELECT * from productos WHERE nombre_producto = '$busqueda'
    OR nombre_producto LIKE '%$busqueda%'
    OR genero = '$busqueda'
    OR estilo = '$busqueda'
    OR edad = '$busqueda'
    OR color = '$busqueda'
    OR tipo_prenda = '$busqueda'
    OR temporada = '$busqueda'
    OR ocasion = '$busqueda'
    OR formalidad = '$busqueda'
    OR material = '$busqueda'
    OR corte = '$busqueda'";     // Esta linea hace la consulta
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
//echo " " . $registro['id_producto']." ";


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

