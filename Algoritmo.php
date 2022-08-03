<?PHP
include "database.php";

session_start();
$id_us = $_SESSION["id_us"];
$compras = [];
$recomendado = [];
$flag = true;

$queryx = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $resultx = mysqli_query($conexion, $queryx); 

if ($registrox = mysqli_fetch_array($resultx)) {

    $queryz = "SELECT * from comprado WHERE id_usuario = '$id_us'";
    $resultz = mysqli_query($conexion, $queryz); 
    while($registroz = mysqli_fetch_array($resultz))
    {
        $compras[] = $registroz['id_producto'];
    }



include 'GetEdadValue.php';
include 'GetEstiloValue.php';
include 'GetFormalidadValue.php';
include 'GetGeneroValue.php';
include 'GetMaterialValue.php';
include 'GetTemporadaValue.php';
include 'GetColorValue.php';

$edad = $_SESSION["edadValue"];
$estilo = $_SESSION["estiloValue"];
$formalidad = $_SESSION["fromalidadValue"];
$genero = $_SESSION["generoValue"];
$material = $_SESSION["materialValue"];
$temporada = $_SESSION["temporadaValue"];
$color = $_SESSION["color"];

$cont = 0;

if($edad <= 0.3)
    {
        $edad = "nino";
    }
    if($edad > 0.3 && $edad < 0.65)
    {
        $edad = "joven";
    }
    if($edad >= 0.65)
    {
        $edad = "adulto";
    }

    if($formalidad >= 0.8)
    {
        $formalidad = "formal";
    }
    if($formalidad > 0.5 && $formalidad < 0.8)
    {
        $formalidad = "semiformal";
    }
    if($formalidad <= 0.5)
    {
        $formalidad = "casual";
    }

    if($genero <= 0.40)
    {
        $genero = "femenino";
    }
    elseif($genero > 0.4 && $genero < 0.6)
    {
        $genero = "unisex";
    }
    elseif($genero >= 0.60)
    {
        $genero = "masculino";
    }

    $estilo1 = estilo1($estilo);

    $estilo2 = estilo2($estilo);
    
    /* echo $edad;
    echo "<br>";
    echo $formalidad;
    echo "<br>";
    echo $estilo1;
    echo "<br>";
    echo $estilo2;
    echo "<br>";
    echo $genero;
    echo "<br>";
    echo $temporada;
    echo "<br>";
    echo $material;
    echo "<br>";
    echo $color; */

    if($temporada < .5 && $temporada > 0)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
        AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
        $result = mysqli_query($conexion, $query); 
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
            {
                if($registro['id_producto'] == $compras[$c2])
                {
                    $flag = false;
                }
            }
            if($flag == true){
                if($cont < 11)
                {   
                    echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                    <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                    <p class='labelElemento'>",
                    $registro['nombre_producto'],
                    "</p>";
                    if($registro['precio_oferta'] == 0)
                    {
                        echo "<p class='labelPrecio'>",
                        $registro['precio'],
                        "</p>";
                    }
                    else
                    {
                        echo "<p class='labelPrecio'>",
                        $registro['precio_oferta'],
                        "</p>";
                    }
                    echo "</div>";   
                }
                else
                {
                    break;
                }
                $cont++;
                $recomendado[] = $registro['id_producto'];
            }
            $flag = true;
        }
    }
    elseif($temporada >= .5)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
        AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
        $result = mysqli_query($conexion, $query); 
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
            {
                if($registro['id_producto'] == $compras[$c2])
                {
                    $flag = false;
                }
            }
            for($c3 = 0; $c3 < count($recomendado); $c3++)
            {
                if($registro['id_producto'] == $recomendado[$c3])
                {
                    $flag = false;
                }
            }
            if($flag == true){

                if($cont < 11)
                {
                    echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                   <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                   <p class='labelElemento'>",
                   $registro['nombre_producto'],
                   "</p>";
                   
                   if($registro['precio_oferta'] == 0)
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio'],
                       "</p>";
                   }
                   else
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio_oferta'],
                       "</p>";
                   }
               
                   echo "</div>";
                }
                else
                {
                    break;
                }
                $cont++;
                $recomendado[] = $registro['id_producto'];
            }
            $flag = true;
        } 
        
    }
    else
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
        AND formalidad = '$formalidad' AND color = '$color'";
        $result = mysqli_query($conexion, $query); 
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
            {
                if($registro['id_producto'] == $compras[$c2])
                {
                    $flag = false;
                }
            }
            for($c3 = 0; $c3 < count($recomendado); $c3++)
            {
                if($registro['id_producto'] == $recomendado[$c3])
                {
                    $flag = false;
                }
            }
            if($flag == true){

                if($cont < 11)
                {
                    echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                   <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                   <p class='labelElemento'>",
                   $registro['nombre_producto'],
                   "</p>";
                   
                   if($registro['precio_oferta'] == 0)
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio'],
                       "</p>";
                   }
                   else
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio_oferta'],
                       "</p>";
                   }
               
                   echo "</div>";
                }
                else
                {
                    break;
                }
                $cont++;
                $recomendado[] = $registro['id_producto'];
            }
            $flag = true;
        }    
    }

    if($cont < 11)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
        AND color = '$color'";
        $result = mysqli_query($conexion, $query); 
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
            {
                if($registro['id_producto'] == $compras[$c2])
                {
                    $flag = false;
                }
            }
            for($c3 = 0; $c3 < count($recomendado); $c3++)
            {
                if($registro['id_producto'] == $recomendado[$c3])
                {
                    $flag = false;
                }
            }
            
            if($flag == true){
               if($cont < 11)
               {
                   echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                   <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                   <p class='labelElemento'>",
                   $registro['nombre_producto'],
                   "</p>";
                   
                   if($registro['precio_oferta'] == 0)
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio'],
                       "</p>";
                   }
                   else
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio_oferta'],
                       "</p>";
                   }
               
                   echo "</div>";
               }
               else
               {
                   break;
               }
               $cont++;
               $recomendado[] = $registro['id_producto'];
            }
            $flag = true;
       }
    }

    if($cont < 11)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'";
        $result = mysqli_query($conexion, $query);
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
            {
                if($registro['id_producto'] == $compras[$c2])
                {
                    $flag = false;
                }
            }
            for($c3 = 0; $c3 < count($recomendado); $c3++)
            {
                if($registro['id_producto'] == $recomendado[$c3])
                {
                    $flag = false;
                }
            }
            
            if($flag == true){
               if($cont < 11)
               {
                   echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                   <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                   <p class='labelElemento'>",
                   $registro['nombre_producto'],
                   "</p>";
                   
                   if($registro['precio_oferta'] == 0)
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio'],
                       "</p>";
                   }
                   else
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio_oferta'],
                       "</p>";
                   }
               
                   echo "</div>";
               }
               else
               {
                   break;
               }
               $cont++;
               $recomendado[] = $registro['id_producto'];
            }
            $flag = true;
       }
    }

    if($cont < 11)
    {
        if($temporada < .5 && $temporada > 0)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
         AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
        $result = mysqli_query($conexion, $query); 
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
                {
                    if($registro['id_producto'] == $compras[$c2])
                    {
                        $flag = false;
                    }
                }
                for($c3 = 0; $c3 < count($recomendado); $c3++)
                {
                    if($registro['id_producto'] == $recomendado[$c3])
                    {
                        $flag = false;
                    }
                }
                if($flag == true){
            if($cont < 11)
            {
                echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
               <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
               <p class='labelElemento'>",
               $registro['nombre_producto'],
               "</p>";
               
               if($registro['precio_oferta'] == 0)
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio'],
                   "</p>";
               }
               else
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio_oferta'],
                   "</p>";
               }
           
               echo "</div>";
            }
            else
            {
                break;
            }
            $cont++;
            $recomendado[] = $registro['id_producto'];
        }
        $flag = true;
        }
    }
    elseif($temporada >= .5)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
        AND color = '$color' AND (temporada = 'primavera' OR temporada = 'verano')";
       $result = mysqli_query($conexion, $query); 
       while ($registro = mysqli_fetch_array($result))
       { 
        for($c2 = 0; $c2 < count($compras); $c2++)
        {
            if($registro['id_producto'] == $compras[$c2])
            {
                $flag = false;
            }
        }
        for($c3 = 0; $c3 < count($recomendado); $c3++)
                {
                    if($registro['id_producto'] == $recomendado[$c3])
                    {
                        $flag = false;
                    }
                }
        if($flag == true){
           if($cont < 11)
           {
            echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
               <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
               <p class='labelElemento'>",
               $registro['nombre_producto'],
               "</p>";
               
               if($registro['precio_oferta'] == 0)
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio'],
                   "</p>";
               }
               else
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio_oferta'],
                   "</p>";
               }
           
               echo "</div>";
           }
           else
           {
               break;
           }
           $cont++;
           $recomendado[] = $registro['id_producto'];
        }
        $flag = true;
       }
    }
    else
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
        AND color = '$color'";
       $result = mysqli_query($conexion, $query); 
       while ($registro = mysqli_fetch_array($result))
       { 
        for($c2 = 0; $c2 < count($compras); $c2++)
        {
            if($registro['id_producto'] == $compras[$c2])
            {
                $flag = false;
            }
        }
        for($c3 = 0; $c3 < count($recomendado); $c3++)
                {
                    if($registro['id_producto'] == $recomendado[$c3])
                    {
                        $flag = false;
                    }
                }
        if($flag == true){
           if($cont < 11)
           {
            echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
               <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
               <p class='labelElemento'>",
               $registro['nombre_producto'],
               "</p>";
               
               if($registro['precio_oferta'] == 0)
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio'],
                   "</p>";
               }
               else
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio_oferta'],
                   "</p>";
               }
           
               echo "</div>";
           }
           else
           {
               break;
           }
           $cont++;
           $recomendado[] = $registro['id_producto'];
        }
        $flag = false;
       }
    }

    if($cont < 11)
    {
        $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'";
       $result = mysqli_query($conexion, $query); 
       while ($registro = mysqli_fetch_array($result))
       { 
        for($c2 = 0; $c2 < count($compras); $c2++)
        {
            if($registro['id_producto'] == $compras[$c2])
            {
                $flag = false;
            }
        }
        for($c3 = 0; $c3 < count($recomendado); $c3++)
                {
                    if($registro['id_producto'] == $recomendado[$c3])
                    {
                        $flag = false;
                    }
                }
        if($flag == true){
           if($cont < 11)
           {
            echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
               <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
               <p class='labelElemento'>",
               $registro['nombre_producto'],
               "</p>";
               
               if($registro['precio_oferta'] == 0)
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio'],
                   "</p>";
               }
               else
               {
                   echo "<p class='labelPrecio'>",
                   $registro['precio_oferta'],
                   "</p>";
               }
           
               echo "</div>";
           }
           else
           {
               break;
           }
           $cont++;
           $recomendado[] = $registro['id_producto'];
        }
        $flag = true;
       }
    }
    }

    
    if($cont < 11)
    {
        $query = "SELECT * from productos WHERE (estilo = '$estilo1' OR estilo = '$estilo2') 
        AND (genero = '$genero' OR genero = 'unisex')";
        $result = mysqli_query($conexion, $query); 
        while ($registro = mysqli_fetch_array($result))
        { 
            for($c2 = 0; $c2 < count($compras); $c2++)
                    {
                        if($registro['id_producto'] == $compras[$c2])
                        {
                            $flag = false;
                        }
                    }
                    for($c3 = 0; $c3 < count($recomendado); $c3++)
                    {
                        if($registro['id_producto'] == $recomendado[$c3])
                        {
                            $flag = false;
                        }
                    }
                    if($flag == true){
            if($cont < 11)
            {
                echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
                   <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
                   <p class='labelElemento'>",
                   $registro['nombre_producto'],
                   "</p>";
                   
                   if($registro['precio_oferta'] == 0)
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio'],
                       "</p>";
                   }
                   else
                   {
                       echo "<p class='labelPrecio'>",
                       $registro['precio_oferta'],
                       "</p>";
                   }
               
                   echo "</div>";
            }
            else
            {
                break;
            }
            $cont++;
            $recomendado[] = $registro['id_producto'];
        }
        $flag = true;
        }
    }

    
    if($cont < 11)
    {
        echo "No hubo mas resultados";
    }
}
else
{
    $query = "SELECT *, COUNT(*) FROM comprado INNER JOIN productos ON productos.id_producto = comprado.id_producto GROUP BY comprado.id_producto ORDER BY COUNT(*) DESC LIMIT 10;";
    $result = mysqli_query($conexion, $query); 
    $cont = 0;
    while ($registro = mysqli_fetch_array($result))
    { 
        echo "<div class='elemento' id'elementoOf' onclick='getProductId(", $registro['id_producto'],")'>
        <img class='imagenElemento' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
        <p class='labelElemento'>",
        $registro['nombre_producto'],
        "</p>";
        
        if($registro['precio_oferta'] == 0)
        {
            echo "<p class='labelPrecio'>",
            $registro['precio'],
            "</p>";
        }
        else
        {
            echo "<p class='labelPrecio'>",
            $registro['precio_oferta'],
            "</p>";
        }
    
        echo "</div>";
        $cont++;
    }
        

    if($cont == 0)
    {
        echo "<div class='producto' id='producto'>
        <p class='precprodcarrito'>
        No ha habido compras aún :(
        </p>
        </div>";
    }

}
 
function estilo1($estilo)
 {
     $estiloArr = array("urbano", "grunge", "gotico", "artsy", "girly", "romantico",  "natural", "clasico", "hipster", "vintage", "preppy", "sofisticado", "dramatico", "boho", "vanguardista");
$valueEstiloArr = array(.15, .20, .25, .35, .40, .45, .50, .55, .60, .65, .70, .75, .80, .85, .90);

    $cnt = 0;
    for($cnt = 1; $cnt < count($valueEstiloArr); $cnt++)
    {
        if($estilo >= $valueEstiloArr[$cnt - 1] && $estilo < $valueEstiloArr[$cnt])
        {
            $estilo1 = $estiloArr[$cnt - 1];
        }
    }

    return $estilo1;
 } 
 
 function estilo2($estilo)
 {
    $estiloArr = array("urbano", "grunge", "gotico", "artsy", "girly", "romantico",  "natural", "clasico", "hipster", "vintage", "preppy", "sofisticado", "dramatico", "boho", "vanguardista");
    $valueEstiloArr = array(.15, .20, .25, .35, .40, .45, .50, .55, .60, .65, .70, .75, .80, .85, .90);
    
    $cnt = 0;
    for($cnt = 1; $cnt < count($valueEstiloArr); $cnt++)
    {
        if($estilo >= $valueEstiloArr[$cnt - 1] && $estilo < $valueEstiloArr[$cnt])
        {
            $estilo2 = $estiloArr[$cnt];
        }
    }
    return $estilo2;
 } 

?>