
<?PHP

session_start();

include "database.php";

$id_u = $_SESSION["id_us"];
$etq = $_SESSION["etq"];
$cat = $_SESSION["cat"];


$comprado = [];

$qp1 = "";
$qp2 = "";
$qp3 = "";

$i = false;

$queryC = "SELECT * from comprado WHERE id_usuario = '$id_u'";
    $resultC = mysqli_query($conexion, $queryC); 
    while($registroC = mysqli_fetch_array($resultC))
    {
        $comprado[] = $registroC['id_producto'];
    }

    $qp1 = "SELECT * FROM productos WHERE $cat = '$etq' ORDER BY RAND();";
    $resultp1 = mysqli_query($conexion, $qp1);
    while($registrop1 = mysqli_fetch_array($resultp1))
    {
        for($contX = 0; $contX < sizeof($comprado); $contX++)
        {
            if($comprado[$contX] == $registrop1['id_producto'])
            {
                $i = true;
                $p1id = $registrop1['id_producto'];
            }
        }
    }
    if($i == false)
    {
        echo "No tienes ninguna prenda con esa etiqueta, intenta comprar mas prendas";
    }
    else
    {
        $qp1 = "SELECT * FROM productos WHERE id_producto = '$p1id'";
        $resultp1 = mysqli_query($conexion, $qp1);
        $registrop1 = mysqli_fetch_array($resultp1);
        echo "<div class='producto' id='producto' onclick='getProductId(", $registrop1['id_producto'],")'>
        <img class='imagenprenda' src='ImagenesPrendas/", $registrop1['id_producto'], ".jpg'>
        <p class='nomprodcarrito' id='NombreProducto'>",
            $registrop1['nombre_producto'],
        "</p>
        <p class='precprodcarrito'>",
            $registrop1['precio'],
        "</p>
        <p class='descprodcarrito'>",
            $registrop1['descripcion'], "<br>",
        "</p>
        </div>";

        $genero = $registrop1['genero']; 
        $estilo = $registrop1['estilo'];
        $tipoPrenda = $registrop1['tipo_prenda'];
        $estiloB = estiloB($estilo);
        $estiloC = estiloC($estilo);

        switch($tipoPrenda)
        {
            case "playera": 
                $qp2 = "SELECT * FROM productos WHERE genero = '$genero' AND (estilo = '$estilo' 
                OR estilo = '$estiloB' OR estilo = '$estiloC') AND (tipo_prenda = 'pantalon' 
                OR tipo_prenda = 'short' OR tipo_prenda = 'falda') AND $cat = '$etq' ORDER BY RAND();";
            break;
            case "pantalon":
                $qp2 = "SELECT * FROM productos WHERE genero = '$genero' AND (estilo = '$estilo' 
                OR estilo = '$estiloB' OR estilo = '$estiloC') AND (tipo_prenda = 'playera' 
                OR tipo_prenda = 'sueter') AND $cat = '$etq' ORDER BY RAND();";
            break;
            case "falda":
                $qp2 = "SELECT * FROM productos WHERE genero = '$genero' AND (estilo = '$estilo' 
                OR estilo = '$estiloB' OR estilo = '$estiloC') AND (tipo_prenda = 'playera' 
                OR tipo_prenda = 'sueter') AND $cat = '$etq' ORDER BY RAND();";
            break;
            case "short":
                $qp2 = "SELECT * FROM productos WHERE genero = '$genero' AND (estilo = '$estilo' 
                OR estilo = '$estiloB' OR estilo = '$estiloC') AND tipo_prenda = 'playera'  
                AND $cat = '$etq' ORDER BY RAND();";
            break;
            case "sueter":
                $qp2 = "SELECT * FROM productos WHERE genero = '$genero' AND (estilo = '$estilo' 
                OR estilo = '$estiloB' OR estilo = '$estiloC') AND (tipo_prenda = 'pantalon' 
                OR tipo_prenda = 'falda') AND $cat = '$etq' ORDER BY RAND();";
            break;
        }
        
        if($tipoPrenda == "vestido" || $ocasion == "elegante")
        {
            $qp2 = "";
        }
            
        if($qp2 == "")
        {
            echo "Es un atuendo de una sola prenda, no hay más recomendaciones";
        }
        else
        {
            $i = false;
            $resultp2 = mysqli_query($conexion, $qp2);
            while($registrop2 = mysqli_fetch_array($resultp2))
            {
                for($contX = 0; $contX < sizeof($comprado); $contX++)
                {
                    if($comprado[$contX] == $registrop2['id_producto'])
                    {
                        $i = true;
                        $p2id = $registrop2['id_producto'];
                    }
                }
            }
            if($i == false)
            {
                echo "No tienes ninguna prenda para combinar, intenta comprar mas prendas";
            }
            else
            {
                $qp2 = "SELECT * FROM productos WHERE id_producto = '$p2id'";
                $resultp2 = mysqli_query($conexion, $qp2);
                $registrop2 = mysqli_fetch_array($resultp2);
                echo "<div class='producto' id='producto' onclick='getProductId(", $registrop2['id_producto'],")'>
                <img class='imagenprenda' src='ImagenesPrendas/", $registrop2['id_producto'], ".jpg'>
                <p class='nomprodcarrito' id='NombreProducto'>",
                    $registrop2['nombre_producto'],
                "</p>
                <p class='precprodcarrito'>",
                    $registrop2['precio'],
                "</p>
                <p class='descprodcarrito'>",
                    $registrop2['descripcion'], "<br>",
                "</p>
                </div>";
            }  
        }
    }

function estiloB($estilo)
{
    $estiloArr = array("urbano", "grunge", "gotico", "artsy", "girly", "romantico",  "natural", "clasico", "hipster", "vintage", "preppy", "sofisticado", "dramatico", "boho", "vanguardista");

   $cnt = 0;
   for($cnt = 0; $cnt < count($estiloArr); $cnt++)
   {
       if($estilo == $estiloArr && $cnt > 0)
       {
           $estiloB = $estiloArr[$cnt - 1];
       }
       else
       {
           $estiloB = "";
       }
   }

   return $estiloB;
} 

function estiloC($estilo)
{
   $estiloArr = array("urbano", "grunge", "gotico", "artsy", "girly", "romantico",  "natural", "clasico", "hipster", "vintage", "preppy", "sofisticado", "dramatico", "boho", "vanguardista");

   $cnt = 0;
   for($cnt = 0; $cnt < count($estiloArr); $cnt++)
   {
       if($estilo == $estiloArr && $cnt < 13)
       {
           $estiloC = $estiloArr[$cnt + 1];
       }
       else
       {
           $estiloC = "";
       }
   }
   return $estiloC;
} 

?>
 
