<?PHP

session_start();


include "database.php";

    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result)){ 

echo "<div class='producto' id='producto' onclick='Maniqui(", $registro['id_producto'],", '", $registro['tipo_prenda']"')'>
<img class='imagenprenda' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
<p class='nomprodcarrito' id='NombreProducto'>",
    $registro['nombre_producto'],
"</p>
</div>";
}
