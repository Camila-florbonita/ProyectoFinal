
<?PHP

session_start();

include "database.php";


$id_us = 1;

    $query = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);

echo "<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
        <div class='imgProduct'>
            <img class='imagenprenda' src='ImagenesPrendas/", $registro2['id_producto'], ".jpg'>
        </div>
        <div class='infoProduct'>
            <p class='product-name'>",
                $registro2['nombre_producto'],
            "</p>
            <p class='product-price'>$ ",
                $registro2['precio'],
            "</p>
            <p class='product-description'>",
                "Comprado el: ", $registro2['fecha'],
            "</p>
            <p class='product-description'>",
                $registro2['descripcion'],
            "</p>
        </div>
    </div>";
$cont++;
}

if($cont == 0)
{
  echo "<div class='producto' id='producto'>
  <p class='product-name'>
  No se tienen compras registradas
  </p>
  </div>";
}


?>
 
