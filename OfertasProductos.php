
<?PHP

session_start();

include "database.php";
    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

    echo "<select name='POferta' id='POferta' multiple>";

    
    while ($registro = mysqli_fetch_array($result)){ 
        echo "<option value=", $registro['id_producto'],">", $registro['id_producto'], ": ", $registro['nombre_producto'],"</option>";
}

 echo "</select>";
?>