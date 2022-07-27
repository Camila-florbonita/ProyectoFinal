
<?PHP

session_start();

include "database.php";

$f1 = $_SESSION['f1'];
$f2 = $_SESSION['f2'];
$f3 = $_SESSION['f3'];
$f4 = $_SESSION['f4'];
$f5 = $_SESSION['f5'];
$f6 = $_SESSION['f6'];
$f7 = $_SESSION['f7'];
$f8 = $_SESSION['f8'];
$f9 = $_SESSION['f9'];

$filtro = "";

if($f1 != "")
{
    $filtro = $filtro . " AND genero = '$f1'";
}
if($f2 != "")
{
    $filtro = $filtro . " AND estilo = '$f2'";
}
if($f3 != "")
{
    $filtro = $filtro . " AND edad = '$f3'";
}
if($f4 != "")
{
    $filtro = $filtro . " AND color = '$f4'";
}
if($f5 != "")
{
    $filtro = $filtro . " AND tipo_prenda = '$f5'";
}
if($f6 != "")
{
    $filtro = $filtro . " AND temporada = '$f6'";
}
if($f7 != "")
{
    $filtro = $filtro . " AND ocasion = '$f7'";
}
if($f8 != "")
{
    $filtro = $filtro . " AND formalidad = '$f8'";
}
if($f9 != "")
{
    $filtro = $filtro . " AND material = '$f9'";
}

$busqueda = $_SESSION["Busqueda"];


    $query = "SELECT * from productos WHERE (nombre_producto = '$busqueda'
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
    OR corte = '$busqueda')";     // Esta linea hace la consulta
    $query = $query . $filtro;
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
//echo " " . $registro['id_producto']." ";


echo "<div class='producto' onclick='getProductId(", $registro['id_producto'],")'>
<div class='image-container'>
    <img class='imagenprenda' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>

</div>
<div class='product-info'>
    <p class='product-name'>
        ",
$registro['nombre_producto'],
"
    </p>
    <p class='price product-price'>$ 
        ",
$registro['precio'],
"
    </p>
    <p class='product-description'>
        ",
$registro['descripcion'],
"
    </p>

</div>
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

