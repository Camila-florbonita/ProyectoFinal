
<?PHP

include "database.php";

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
$corte =  $_POST["corte"];
$precio = $_POST["precio"];
$descprenda = $_POST["descprenda"];
$TXS = $_POST["nxs"];
$TS = $_POST["ns"];
$TM = $_POST["nm"];
$TL = $_POST["nl"];
$TXL = $_POST["nxl"];
$archivo = $_FILES['archivo']['name'];

if (isset($archivo) && $archivo != "")
{
   $tipo = $_FILES['archivo']['type'];
   if (!(strpos($tipo,'jpg') || strpos($tipo,'jpeg'))) // || strpost($tipo,'png') || strpost($tipo,'jpeg') || 
   {
      echo "<script> alert('Solo se permiten archivos tipo imagen con las extenciones jpg') </script>";
   }
   else
   {
      $ingreso = "INSERT into productos (nombre_producto, genero, estilo, edad, color, tipo_prenda, temporada, ocasion, formalidad, material, corte, precio, descripcion, precio_oferta, ruta) 
      VALUES ('$nombreprenda', '$genero', '$estilo', '$edad', '$color', '$tipodeprenda', '$temporada', '$ocasion', '$formalidad', '$material', '$corte','$precio', '$descprenda', 0, '')";
      mysqli_query($conexion, $ingreso);
      
      $query = "SELECT id_producto from productos ORDER BY id_producto DESC LIMIT 1";
      $result = mysqli_query($conexion, $query); 
      $registro = mysqli_fetch_array($result);
      $idProducto = $registro['id_producto'];
      
      $ingresoTallas = "INSERT into tallas (id_producto, XS, S, M, L, XL) VALUES ('$idProducto', '$TXS', '$TS', '$TM', '$TL', '$TXL')";
      mysqli_query($conexion, $ingresoTallas);
      
      $archivo = $_FILES['archivo']['name'];
      
      if (isset($archivo) && $archivo != "")
      {
         $tipo = $_FILES['archivo']['type'];
         $temporal_name = $_FILES['archivo']['tmp_name'];
      
         if (!(strpos($tipo,'jpg') || strpos($tipo,'jpeg'))) // || strpost($tipo,'png') || strpost($tipo,'jpeg') || 
         {
            echo "<script> alert('Solo se permiten archivos tipo imagen con las extenciones jpg') </script>"; //png y jpeg
         }
         else
         {
            $ruta = 'ImagenesPrendas'.'/'.$idProducto.'.jpg';
            $file_query = "INSERT INTO productos (ruta) VALUES ('$ruta') WHERE id_producto = $idProducto";
            $file_query = "UPDATE productos SET ruta = '$ruta' WHERE id_producto = $idProducto";
            $resultado = mysqli_query($conexion, $file_query);
            if ($resultado)
            {
               move_uploaded_file($temporal_name, 'ImagenesPrendas'.'/'.$idProducto.'.jpg');
               echo "<script> alert('Subido con éxtio') </script> ";
            }
            else
            {
               echo "<script> alert('Ocurrió un error al subir el archivo intente de nuevo') </script>";
            }
         }
      
      }
      else
            {
               echo "<script> alert('Ocurrió un error intente de nuevo') </script>"; 
            }

   }
}



echo "<script> window.location.href = 'AgregarPrenda.html' </script>"; 

?>

