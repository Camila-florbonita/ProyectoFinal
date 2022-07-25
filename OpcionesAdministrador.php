<?PHP

session_start();


include "database.php";

    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result))
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
            </div>
            <div class='buttons-container'>
                <button class='btn btn-success' onclick='Editar(", $registro['id_producto'], ")'><i class='fas fa-pencil-alt'></i></button>
                <button class='btn btn-danger' onclick='Borrar(", $registro['id_producto'], ")'><i class='far fa-trash-alt'></i></button>
            </div>
        </div>";
    }