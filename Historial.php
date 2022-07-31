
<?PHP

session_start();

include "database.php";


$id_us = $_SESSION["id_us"];

    $query = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result)){ 
        $id_prenda = $registro['id_producto'];
        $query2 = "SELECT * from productos WHERE id_producto = '$id_prenda'";
        $result2 = mysqli_query($conexion, $query2); 
        $registro2 = mysqli_fetch_array($result2);

echo "<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
        <div class='image-container'>
            <img class='imagenprenda' src='ImagenesPrendas/", $registro2['id_producto'], ".jpg'>
        </div>
        <div class='product-info'>
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
            <div class='columns'>
            <div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Prenda: </p>
                <p class='product-description categorias'>", $registro2['tipo_prenda'], "</p>
            </div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Género: </p>
                <p class='product-description categorias'>", $registro2['genero'], "</p>
            </div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Color: </p>
                <p class='product-description categorias'>", $registro2['color'], "</p>
            </div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Temporada: </p>
                <p class='product-description categorias'>", $registro2['temporada'], "</p>
            </div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Estilo: </p>
                <p class='product-description categorias'>", $registro2['estilo'], "</p>
            </div>
            </div>
            <div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Edad: </p>
                <p class='product-description categorias'>", $registro2['edad'], "</p>
            </div>
            <div style='display: flex;'>
            <p class='product-description categorias'>Material: </p>
            <p class='product-description categorias'>", $registro2['material'], "</p>
            </div>
            <div style='display: flex;'>
            <p class='product-description categorias'>Corte: </p>
            <p class='product-description categorias'>", $registro2['corte'], "</p>
            </div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Formalidad: </p>
                <p class='product-description categorias'>", $registro2['formalidad'], "</p>
            </div>
            <div style='display: flex;'>
                <p class='product-description categorias'>Ocasión: </p>
                <p class='product-description categorias'>", $registro2['ocasion'], "</p>
            </div>
            </div>
            </div>
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
 
