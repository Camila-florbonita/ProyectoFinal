
<?PHP

session_start();

include "database.php";
    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

   // echo "<input list='productoOfertas' type='text' name='POferta' id='POferta' class='input'>
     echo "<datalist id='productoOfertas'>";
                        
                    

    //echo "<select name='POferta' class='input' id='POferta' multiple style='height: 100%;'>";

    
    while ($registro = mysqli_fetch_array($result)){ 
        echo "<option value=", $registro['id_producto'],">", $registro['id_producto'], ": ", $registro['nombre_producto'],"</option>";
}
echo "</datalist>";
// echo "</select>";
?>