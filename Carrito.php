
<?PHP

session_start();
include "database.php";
$totalCarrito = 0;

$id_us = $_SESSION["id_us"];

$query = "SELECT * from carrito WHERE id_usuario = '$id_us'";
$result = mysqli_query($conexion, $query); 

$cont = 0;
while ($registro = mysqli_fetch_array($result)){ 
    $id_prenda = $registro['id_producto'];
    $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
    $result2 = mysqli_query($conexion, $query2); 
    $registro2 = mysqli_fetch_array($result2);
    
    echo "<div class='product-container'>
    <div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
                        <div class='imgProduct'>
                            <img class='imagenprenda' src='ImagenesPrendas/", $registro2['id_producto'], ".jpg'>
            
                        </div>
                        <div class='infoProduct'>
                            <p class='product-name'>",
        $registro2['nombre_producto'],
        "</p>";
        if($registro2['precio_oferta'] != 0)
        {
            echo "<p class='price product-price'>$ ",
        $registro2['precio_oferta'],
        "</p>";
        }
        else
        {
            echo "<p class='price product-price'>$ ",
        $registro2['precio'],
        "</p>";
        }
        echo "<p class='product-description'>",
        $registro2['descripcion'],
        "</p>
        <p class='product-description'>",
        $registro['talla'],
        "</p>
        </div>
        </div>         
                            <div class='delete-button-container'>
                                <button class='btn btn-danger' onclick='remove(", $registro['id_carrito'],")'><i class='far fa-trash-alt'></i></button>
                            </div>
        
                        
                    </div>
    ";
    $cont++;
    if($registro2['precio_oferta'] != 0)
    {
        $totalCarrito = $totalCarrito + $registro2['precio_oferta'];
    }
    else
    {
        $totalCarrito = $totalCarrito + $registro2['precio'];
    }
    
}

if($cont == 0)
{
    echo "<div class='producto' id='producto'>
    <p class='product-name'>
    No se tienen productos en el carrito
    </p>
    </div>";
}

$_SESSION["totalCarrito"] = $totalCarrito;
?>
 
