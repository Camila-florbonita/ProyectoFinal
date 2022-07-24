
<?PHP

session_start();

include "database.php";

$id_p = $_SESSION["id_p"];

    $query = "SELECT * from comentarios WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_u = $registro['id_usuario'];
        $query2 = "SELECT * from usuarios WHERE id_usuario = '$id_u'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);

        echo "<div class='comment-box''>     
        <p class='username'>",
            $registro2['nombre_usuario'],
        "</p>
        <p class='comment-text'>",
            $registro['comentario'],
        "</p>
    </div>";
$cont++;
}

if($cont == 0)
{
  echo "<div class='comment-box'>     
  <p class='username'>
  No hay comentarios
  </p>
</div>";
}


?>
 
