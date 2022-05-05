
<?PHP

session_start();

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$id = 6;

    $query = "SELECT * from productos WHERE id_producto = '$id'";     // Esta linea hace la consulta
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result)){ 
//echo " " . $registro['id_producto']." ";


echo "<div id='producto'>
<div class='imagenesdelproducto'>
    <img class='imagenprincipal' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
    <img class='imagensecundaria' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
    <img class='imagensecundaria' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
    <img class='imagensecundaria' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
    
</div>

<p class='nombredelproducto' id='NombreProducto'>",
    $registro['nombre_producto'],
"</p>
<p class='preciodelproducto'>",
    $registro['precio'],
"</p>
</div>";

}



?>

