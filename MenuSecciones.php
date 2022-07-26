
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
    <p class='price product-price'>
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
  <p class='product-name'>
  No hay coincidencias para esa busqueda
  </p>
  </div>";
}


?>

