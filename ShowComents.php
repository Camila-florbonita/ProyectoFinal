
<?PHP

session_start();

$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");


$id_p = $_SESSION["id_p"];

    $query = "SELECT * from comentarios WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_u = $registro['id_usuario'];
        $query2 = "SELECT * from usuarios WHERE id_usuario = '$id_u'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);

        echo "<div class= 'comentarios'>     
        <p class= 'nombreusuario'>",
            $registro2['nombre_usuario'],
        "</p>
        <p class= 'comentario'>",
            $registro['comentario'],
        "</p>
    </div>";
$cont++;
}

if($cont == 0)
{
  echo "<div class= 'comentarios'>     
  <p class= 'nombreusuario'>
  No hay comentarios
  </p>
</div>";
}


?>
 
