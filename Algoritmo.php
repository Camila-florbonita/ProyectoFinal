<?PHP
include "database.php";

session_start();
$edad = $_SESSION["edadValue"];
$estilo = $_SESSION["estiloValue"];
$formalidad = $_SESSION["fromalidadValue"];
$genero = $_SESSION["generoValue"];
$material = $_SESSION["materialValue"];
$temporada = $_SESSION["temporadaValue"];
$color = $_SESSION["color"];
$id_us = 1;
$cont = 0;

echo $edad, "<br>";

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

    echo $formalidad, "<br>";
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

    echo $genero, "<br>";

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


    echo $edad, "<br>";


    echo $genero, "<br>";
    

    echo $formalidad, "<br>";

    $estilo1 = estilo1($estilo);
    echo $estilo1, "<br>";

    $estilo2 = estilo2($estilo);
    echo $estilo2, "<br>";


    if($genero == "femenino")
    {
        if($temporada < .5 && $temporada > 0)
        {
            if($formalidad < 0)
            {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
            else
            {
                $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
        }
        if($temporada >= .5)
        {
            if($formalidad < 0)
            {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
            else
            {
                $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
        }

        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
             AND formalidad = '$formalidad' AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }

        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
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
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
        }
        if($temporada >= .5)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color' AND (temporada = 'primavera' OR temporada = 'verano')";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        }
    }

    if($genero == "masculino")
    {
        if($temporada < .5 && $temporada > 0)
        {
            if($formalidad < 0)
            {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
            else
            {
                $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
        }
        if($temporada >= .5)
        {
            if($formalidad < 0)
            {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
            else
            {
                $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
             AND formalidad = '$formalidad' AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }

        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
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
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
        }
        if($temporada >= .5)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color' AND (temporada = 'primavera' OR temporada = 'verano')";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        }
    }

    if($genero == "unisex")
    {
        if($temporada < .5 && $temporada > 0)
        {
            if($formalidad < 0)
            {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
            else
            {
                $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
        }
        if($temporada >= .5)
        {
            if($formalidad < 0)
            {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND formalidad = '$formalidad' AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
            else
            {
                $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad' 
            AND color = '$color' AND (temporada = 'otono' OR temporada = 'invierno')";
            $result = mysqli_query($conexion, $query); 
            while ($registro = mysqli_fetch_array($result))
            { 
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
            }
        }

        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
            AND formalidad = '$formalidad' AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }

        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo1' AND genero = '$genero' AND edad = '$edad'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
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
                if($cont < 11)
                {
                    echo $registro['id_producto'], "<br>";
                }
                else
                {
                    break;
                }
                $cont++;
            }
        }
        if($temporada >= .5)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color' AND (temporada = 'primavera' OR temporada = 'verano')";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'
            AND color = '$color'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        if($cont < 11)
        {
            $query = "SELECT * from productos WHERE estilo = '$estilo2' AND genero = '$genero' AND edad = '$edad'";
           $result = mysqli_query($conexion, $query); 
           while ($registro = mysqli_fetch_array($result))
           { 
               if($cont < 11)
               {
                   echo $registro['id_producto'], "<br>";
               }
               else
               {
                   break;
               }
               $cont++;
           }
        }
        }
    }

    
if($cont < 11)
{
    echo "No hubo mas resultados";
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