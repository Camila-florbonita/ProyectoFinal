<?PHP

session_start();

include "database.php";
$fecha = date("Y-m-d");

    $query = "SELECT * from productos WHERE precio_oferta != 0";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result))
    { 
        $id_p = $registro['id_producto'];
        $quer = "SELECT * from tallas WHERE id_producto = '$id_p'";
        $resul = mysqli_query($conexion, $quer); 
        $registr = mysqli_fetch_array($resul);
    
        $que = "SELECT * from ofertas WHERE id_producto = '$id_p'";
        $resu = mysqli_query($conexion, $que); 
        $regist = mysqli_fetch_array($resu);
        if($regist['inicio'] <= $fecha)
        {
            if($registr['XS'] != 0 || $registr['S'] != 0 || $registr['M'] != 0 || $registr['L'] != 0 || $registr['XL'] != 0)
            {
        
                echo "<div class='elemento' id='elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                <p class='labelElemento'>",
                    $registro['nombre_producto'],
                "</p>
                <p class='labelPrecio'>",
                    $registro['precio_oferta'],
                "</p>
                </div>";
                $cont++;
            }
        }
    }

if($cont == 0)
{
  echo "<div class='elemento' id='elementoOf'>
  <p class='labelElemento'>
  No hay ofertas por ahora
  </p>
  </div>";
}


?>
 
