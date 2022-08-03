<?PHP

session_start();


include "database.php";

    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result))
    { 
        if($registro['precio_oferta'] != 0)
        {
            echo "
            <div class='producto'>
                <div class='image-container'>
                    <img class='imagenprenda' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                </div>
                <div class='product-info'>
                    <p class='product-name'>",
                        $registro['nombre_producto'],
                    "</p>
                    <p class='price product-price'>ID: ",
                        $registro['id_producto'],            
                    "</p>
                    <p class='product-name'>$ 
                        ", $registro['precio_oferta'], "
                    </p>
                    <p class='product-description'><del>$ 
                        ", $registro['precio'], "
                    </del></p>
                </div>
            </div>";
        }
    }