
<?PHP

session_start();

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

    echo "<select name='POferta' id='POferta' multiple>";

    
    while ($registro = mysqli_fetch_array($result)){ 
        echo "<option value=", $registro['id_producto'],">", $registro['id_producto'], ": ", $registro['nombre_producto'],"</option>";
}

 echo "</select>";
?>