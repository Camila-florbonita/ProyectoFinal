
<?PHP

session_start();

$id_p = $_SESSION["id_p"];
$nombreprenda = $_POST["nombreprenda"];
$genero = $_POST["genero"];
$estilo = $_POST["estilo"];
$edad =  $_POST["edad"];
$color =  $_POST["color"];
$tipodeprenda =  $_POST["tipodeprenda"];
$temporada =  $_POST["temporada"];
$ocasion =  $_POST["ocasion"];
$formalidad =  $_POST["formalidad"];
$material =  $_POST["material"];
$precio = $_POST["precio"];
$TXS = $_POST["nxs"];
$TS = $_POST["ns"];
$TM = $_POST["nm"];
$TL = $_POST["nl"];
$TXL = $_POST["nxl"];
$archivo = $_FILES['archivo']['name'];

include "database.php";

if (isset($archivo) && $archivo != "")
{
   $tipo = $_FILES['archivo']['type'];
   $temporal_name = $_FILES['archivo']['tmp_name'];

   if (!(strpos($tipo,'jpg') || strpos($tipo,'jpeg'))) // || strpost($tipo,'png') || strpost($tipo,'jpeg') || 
   {
      echo "<script> alert('Solo se permiten archivos tipo imagen con las extenciones jpg') </script>"; //png y jpeg
      echo "<script> window.location.href = 'OpcionesAdministrador.html' </script>"; 
    }
   else
   {
      $ruta = 'ImagenesPrendas'.'/'.$id_p.'.jpg';
      $file_query = "UPDATE productos SET ruta = '$ruta' WHERE id_producto = $id_p";
      $resultado = mysqli_query($conexion, $file_query);
      if ($resultado)
      {
         move_uploaded_file($temporal_name, 'ImagenesPrendas'.'/'.$id_p.'.jpg');
      }
      else
      {
         echo "<script> alert('Ocurrió un error al subir el archivo intente de nuevo') </script>";
         echo "<script> window.location.href = 'OpcionesAdministrador.html' </script>"; 
        }
   }

}

$ingreso = "UPDATE productos SET nombre_producto = '$nombreprenda', genero = '$genero', estilo = '$estilo', 
edad = '$edad', color = '$color', tipo_prenda = '$tipodeprenda', temporada = '$temporada', ocasion = '$ocasion', 
formalidad = '$formalidad', material = '$material', precio = '$precio' WHERE id_producto = '$id_p'";
mysqli_query($conexion, $ingreso);

$query = "SELECT * from tallas WHERE id_producto = '$id_p'";
$result = mysqli_query($conexion, $query); 
if($registro = mysqli_fetch_array($result))
{
    $ingresoTallas = "UPDATE  tallas SET XS = '$TXS', S = '$TS', M = '$TM', L = '$TL', XL = '$TXL' WHERE id_producto = '$id_p'";
    $query2 = "SELECT * from tallas WHERE id_producto = '$id_p'";
    $result2 = mysqli_query($conexion, $query2); 
    $registro2 = mysqli_fetch_array($result2);
    if($registro2["XS"] > 0||$registro2["S"] > 0||$registro2["M"] > 0||$registro2["L"] > 0||$registro2["XL"] > 0)
    {
        $query3 = "SELECT * from listadedeseos WHERE id_producto = '$id_p'";
        $result3 = mysqli_query($conexion, $query3); 
        while($registro3 = mysqli_fetch_array($result3))
        {
            $id_usuario = $registro3['id_usuario'];
            $get_user = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
            $result_user = mysqli_query($conexion, $get_user);
            $registro_user = mysqli_fetch_array($result_user);
            $correo_electronico = $registro_user['correo_electronico'];
            $nombre_usuario = $registro_user['nombre_usuario'];

            $id_producto = $registro3['id_producto'];
            $get_product = "SELECT * FROM productos WHERE id_producto = $id_producto";
            $result_product = mysqli_query($conexion, $get_product);
            $registro_product = mysqli_fetch_array($result_product);
            $nombre_producto = $registro_product['nombre_producto'];
            $descripcion = $registro_product['descripcion'];

            include 'enviarCorreo.php';
        }
    }
}
else
{
    $ingresoTallas = "INSERT into tallas (id_producto, XS, S, M, L, XL) VALUES ('$id_p', '$TXS', '$TS', '$TM', '$TL', '$TXL')";
}
mysqli_query($conexion, $ingresoTallas);
echo "<script> alert('Subido con éxtio') </script> ";





echo "<script> window.location.href = 'OpcionesAdministrador.html' </script>"; 

?>

