
<?PHP

session_start();

include "database.php";


$id_us = $_SESSION["id_us"];

    $query = "SELECT * from listadedeseos WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);

echo "
<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
                    <div class='imgProduct'>
                        <img class='imagenprenda' src='ImagenesPrendas/", $registro2['id_producto'], ".jpg'>
        
                    </div>
                    <div class='infoProduct'>
                        <p class='product-name'>",
    $registro2['nombre_producto'],
    "</p>
                        <p class='price product-price'>$ ",
    $registro2['precio'],
    "</p>
                        <p class='product-description'>",
    $registro2['descripcion'],
    "</p>
                        
                        <div class='delete-button-container'>
                            <button class='btn btn-danger' onclick='remove(", $registro2['id_producto'],")'><i class='far fa-trash-alt'></i></button>
                        </div>
                    </div>
    
                    
                </div>
";
$cont++;
}

if($cont == 0)
{
  echo "<div class='producto' id='producto'>
  <p class='product-name'>
  No se tienen productos en la lista de deseos
  </p>
  </div>";
}


?>
 
