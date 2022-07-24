<?PHP

session_start();


include "database.php";

    $query = "SELECT * from productos";
    $result = mysqli_query($conexion, $query); 

    while ($registro = mysqli_fetch_array($result))
    { 
        echo "<div class='grid grid-cols-1 md:grid-cols-5' id='producto'>
        <img class='imagenprenda' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
        <p class='nomprodcarrito' id='NombreProducto'>",
            $registro['nombre_producto'],
        "</p>
        <p class='precprodcarrito'>",
            $registro['id_producto'],            
        "</p>
        <p>
                <button onclick='Editar(", $registro['id_producto'], ")'>Editar</button>
                <button onclick='Borrar(", $registro['id_producto'], ")'>Borrar</button>
            </p>
        </div>";
    }