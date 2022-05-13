<?PHP

session_start();
$edad = $_SESSION["edadValue"];
$estilo = $_SESSION["estiloValue"];
$formalidad = $_SESSION["fromalidadValue"];
$genero = $_SESSION["generoValue"];
$material = $_SESSION["materialValue"];
$temporada = $_SESSION["temporadaValue"];
$id_us = 1;
$cont = 0;


$conexion = mysqli_connect("localhost", "root", "") or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, 'proyecto') or die ( "No se ha podido conectar a la base de datos");

$edad = edad($edad);
    echo $edad, "<br>";

    $genero = genero($genero);
    echo $genero, "<br>";
    
    $formalidad = formalidad($formalidad);
    echo $formalidad, "<br>";

    $estilo1 = estilo1($estilo);
    echo $estilo1, "<br>";

    $estilo2 = estilo2($estilo);
    echo $estilo2, "<br>";

    $query = "SELECT * from productos WHERE estilo = '$estilo2'";
    $result = mysqli_query($conexion, $query); 

    
    while ($registro = mysqli_fetch_array($result)){ 
        if($cont < 11){
        echo $registro['id_producto'], "<br>";
        }
        $cont++;
}

if($cont == 0)
{
    echo "No hubo resultados";
}

 function edad($edad)
 {
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

    return $edad;
 }   

 function formalidad($formalidad)
 {
    if($formalidad <= 0.5)
    {
        $formalidad = "casual";
    }
    if($formalidad > 0.5 && $formalidad < 0.8)
    {
        $formalidad = "semiformal";
    }
    if($formalidad >= 0.8)
    {
        $formalidad = "formal";
    }

    return $formalidad;
 }   

 function genero($genero)
 {
    if($genero <= 0.4)
    {
        $genero = "femenino";
    }
    if($genero > 0.4 && $genero < 0.6)
    {
        $genero = "unisex";
    }
    if($genero >= 0.6)
    {
        $genero = "masculino";
    }

    return $genero;
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