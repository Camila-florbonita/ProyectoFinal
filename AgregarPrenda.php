
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

// //if (isset($_POST['subir'])) {
//     //Recogemos el archivo enviado por el formulario
//     $archivo = $_FILES['archivo']['name'];
//     //Si el archivo contiene algo y es diferente de vacio
//     if (isset($archivo) && $archivo != "") {
//        //Obtenemos algunos datos necesarios sobre el archivo
//        $tipo = $_FILES['archivo']['type'];
//        $tamano = $_FILES['archivo']['size'];
//        $temp = $_FILES['archivo']['tmp_name'];
//        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
//       if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
//          echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
//          - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
//       }
//       else {
//          //Si la imagen es correcta en tamaño y tipo
//          //Se intenta subir al servidor
//          if (move_uploaded_file($temp, 'images/'.$archivo)) {
//              //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
//              chmod('images/'.$archivo, 0777);
//              //Mostramos el mensaje de que se ha subido co éxito
//              echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
//              //Mostramos la imagen subida
//              echo '<p><img src="images/'.$archivo.'"></p>';
//          }
//          else {
//             //Si no se ha podido subir la imagen, mostramos un mensaje de error
//             echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
//          }
//        }
//     }
//  //}

$ingreso = "INSERT into productos (nombre_producto, genero, estilo, edad, color, tipo_prenda, temporada, ocasion, formalidad, material, corte, precio, descripcion, precio_oferta) 
VALUES ('$nombreprenda', '$genero', '$estilo', '$edad', '$color', '$tipodeprenda', '$temporada', '$ocasion', '$formalidad', '$material', '$corte','$precio', '$descprenda', 0)";
mysqli_query($conexion, $ingreso);

$query = "SELECT id_producto from productos ORDER BY id_producto DESC LIMIT 1";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);
$idProducto = $registro['id_producto'];

$ingresoTallas = "INSERT into tallas (id_producto, XS, S, M, L, XL) VALUES ('$idProducto', '$TXS', '$TS', '$TM', '$TL', '$TXL')";
mysqli_query($conexion, $ingresoTallas);

// $fileName = $_FILES['nameInput']['name'];
//    $temp = $_FILES['nameInput']['tmp_name'];
//    $rootFolder = 'ImagenesPrendas/';
//    $rootFile = $rootFolder.$idProducto.'.jpg';
//    move_uploaded_file($temp,$rootFolder.$fileName); // o $rootFolder.XD
//    $query = "INSERT INTO productos (imagen) VALUES ('$rootFile')";
//    mysqli_query($conexion, $query);

   if ($_FILES["archivo"]["error"] > 0)
{
   echo "Error al cargar el archivo";
}
else
{
   $acceptedFiles = array("image/jpg");
   $limite_kb = 3000;

   if (in_array($_FILES["archivo"]["type"], $acceptedFiles) && $_FILES["archivo"]["size"] <= $limite_kb * 1024)
   {
      $ruta = 'ImagenesPrendas/';
      $fileName = $ruta.$id_producto.'.jpg';

      if(!file_exists($ruta))
      {
         mkdir($ruta);
      }

      if (!file_exists($fileName))
      {
         $result = @move_uploaded_file($_FILES["archivo"]["tmp_name"],$fileName);

         if($result)
         {
            echo "Archivo Guardado";
         }
         else
         {
            echo "Error al guardar el archivo";
         }
      }
      else
      {
         echo "Archivo ya existe";
      }
   }
   else
   {
      echo "Archivo no permitido o excede el tamaño";
   }
}

header("Location: AgregarPrenda.html");
?>

