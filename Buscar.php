
<?PHP

session_start();

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");
//$busqueda = $_POST["buscar"];
$busqueda = $_SESSION["Busqueda"];

    $query = "SELECT * from productos WHERE nombre_producto = '$busqueda'
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


echo "<div class='producto' id='producto'>
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

