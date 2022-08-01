
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

    switch($cat)
    {
        case "genero":
            $qp1 = "SELECT * FROM productos WHERE genero = '$etq' AND tipo_prenda  = 'playera'";
            if($etq == "femenino")
            {
                $qp2 = "SELECT * FROM productos WHERE genero = '$etq' AND (tipo_prenda  = 'falda' OR tipo_prenda  = 'short')";
            }
            else
            {
                $qp2 = "SELECT * FROM productos WHERE genero = '$etq' AND (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short')";
            }
        break;
        case "estilo":
            $qp1 = "SELECT * FROM productos WHERE estilo = '$etq' AND (tipo_prenda  = 'playera' OR tipo_prenda = 'sueter')";
            $qp2 = "SELECT * FROM productos WHERE estilo = '$etq' AND 
            (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
        break;
        case "edad":
            $qp1 = "SELECT * FROM productos WHERE edad = '$etq' AND tipo_prenda  = 'playera'";
            $qp2 = "SELECT * FROM productos WHERE edad = '$etq' AND 
            (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
        break;
        case "color":
            $qp1 = "SELECT * FROM productos WHERE color = '$etq' AND (tipo_prenda  = 'playera' OR tipo_prenda = 'sueter')";
            $qp2 = "SELECT * FROM productos WHERE color = '$etq' AND 
            (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
        break;
        case "prenda":
            $qp1 = "SELECT * FROM productos WHERE tipo_prenda = '$etq'";
            if($etq == "playera" || $etq == "sueter")
            {
                $qp2 = "SELECT * FROM productos WHERE (tipo_prenda  = 'pantalon' OR 
                tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
            if($etq == "pantalon" || $etq == "short" || $etq == "falda")
            {
                $qp2 = "SELECT * FROM productos WHERE (tipo_prenda  = 'playera' OR tipo_prenda  = 'sueter')";
            }
            if($etq == "vestido")
            {
                $qp2 = "";
            }
        break;
        case "temporada":
            if($etq == "primavera" || $etq == "verano")
            {
                $qp1 = "SELECT * FROM productos WHERE temporada = '$etq' AND tipo_prenda  = 'playera'";
                $qp2 = "SELECT * FROM productos WHERE temporada = '$etq' AND 
                (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
            if($etq == "otono" || $etq == "invierno")
            {
                $qp1 = "SELECT * FROM productos WHERE temporada = '$etq' AND tipo_prenda  = 'playera'";
                $qp2 = "SELECT * FROM productos WHERE temporada = '$etq' AND tipo_prenda  = 'pantalon'";
                $qp3 = "SELECT * FROM productos WHERE temporada = '$etq' AND tipo_prenda  = 'sueter'";
            }
        break;
        case "ocasion": 
            if($etq == "playa")
            {
                $qp1 = "SELECT * FROM productos WHERE ocasion = '$etq' AND tipo_prenda  = 'playera'";
                $qp2 = "SELECT * FROM productos WHERE ocasion = '$etq' AND 
                (tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
            if($etq == "elegante")
            {
                $qp1 = "SELECT * FROM productos WHERE ocasion = '$etq'";
                $qp2 = "";
            }
            if($etq == "deporte")
            {
                $qp1 = "SELECT * FROM productos WHERE ocasion = '$etq' AND tipo_prenda  = 'playera'";
                $qp2 = "SELECT * FROM productos WHERE ocasion = '$etq' AND tipo_prenda  = 'short'";
            }
            if($etq == "fiesta")
            {
                $qp1 = "SELECT * FROM productos WHERE ocasion = '$etq' AND tipo_prenda  = 'playera'";
                $qp2 = "SELECT * FROM productos WHERE ocasion = '$etq' AND 
                (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
        break;
        case "formalidad":
            $qp1 = "SELECT * FROM productos WHERE formalidad = '$etq' AND tipo_prenda  = 'playera'";
            $qp2 = "SELECT * FROM productos WHERE formalidad = '$etq' AND 
            (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";        

        break;
        case "material":
            $qp1 = "SELECT * FROM productos WHERE material = '$etq' AND (tipo_prenda  = 'playera' OR tipo_prenda = 'sueter')";
            if($etq == "licra")
            {
                $qp2 = "SELECT * FROM productos WHERE NOT (material = 'cuero' OR material = 'mezclilla') AND 
                (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
            elseif($etq == "cuero")
            {
                $qp2 = "SELECT * FROM productos WHERE NOT (material = 'licra' OR material = 'seda') AND 
                (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
            else
            {
                $qp2 = "SELECT * FROM productos WHERE (tipo_prenda  = 'pantalon' OR tipo_prenda  = 'short' OR tipo_prenda  = 'falda')";
            }
        break;
    }

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
            $registrop1['corte'], "<br>",
        "</p>
        </div>";
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
                $registrop2['corte'], "<br>",
            "</p>
            </div>";
        }  
    }
    
    if($qp3 != "")
    {
        $i = false;
        $resultp3 = mysqli_query($conexion, $qp3);
        while($registrop3 = mysqli_fetch_array($resultp3))
        {
            for($contX = 0; $contX < sizeof($comprado); $contX++)
            {
                if($comprado[$contX] == $registrop3['id_producto'])
                {
                    $i = true;
                    $p3id = $registrop3['id_producto'];
                }
            }
        }
        if($i == false)
        {
            echo "No tienes otra prenda para combinar, intenta comprar mas prendas";
        }
        else
        {
            $qp3 = "SELECT * FROM productos WHERE id_producto = '$p3id'";
            $resultp3 = mysqli_query($conexion, $qp3);
            $registrop3 = mysqli_fetch_array($resultp3);
            echo "<div class='producto' id='producto' onclick='getProductId(", $registrop3['id_producto'],")'>
            <img class='imagenprenda' src='ImagenesPrendas/", $registrop3['id_producto'], ".jpg'>
            <p class='nomprodcarrito' id='NombreProducto'>",
                $registrop3['nombre_producto'],
            "</p>
            <p class='precprodcarrito'>",
                $registrop3['precio'],
            "</p>
            <p class='descprodcarrito'>",
                $registrop3['corte'], "<br>",
            "</p>
            </div>";
        }  
    }

?>
 
