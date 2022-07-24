
<?PHP

session_start();

$id_u = $_SESSION["id_us"];
echo $id_u;
$comentario =  $_POST["comentario"];
$id_p = $_SESSION["id_p"];
echo $id_p;

include "database.php";

$query = "SELECT * from comprado WHERE id_producto = '$id_p' AND id_usuario = '$id_u'";
    $result = mysqli_query($conexion, $query); 
    $cont = 0;
    if ($registro = mysqli_fetch_array($result))
    { 
        $ingreso = "INSERT into comentarios (id_usuario, id_producto, comentario) VALUES ('$id_u','$id_p','$comentario')";
        mysqli_query($conexion, $ingreso);
        header("Location: ProductoConCuenta.html");
    }
    else
{
  echo "<script>     
  alert('No has comprado la prenda, no puedes comentar');
</script>";
echo "<script> window.location.href = 'ProductoConCuenta.html' </script>";
}





?>

