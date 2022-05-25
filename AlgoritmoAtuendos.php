
<?PHP

session_start();

include "database.php";

$id_u = $_SESSION["id_us"];
$id_p = $_REQUEST["id"];
$comprado = [];

$queryC = "SELECT * from comprado WHERE id_usuario = '$id_u'";
    $resultC = mysqli_query($conexion, $query); 
    while($registroC = mysqli_fetch_array($result))
    {
        $comprado[] = $registroC['id_producto'];
    }

$id_us = 1;
$flag = false;
$flag2 = false;
$flag3 = false;
$flag4 = false;

    $query = "SELECT * from productos WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 
    $registro = mysqli_fetch_array($result);

    $color =  $registro['color'];
    $genero = $registro['genero']; 
    $estilo = $registro['estilo'];
    $edad = $registro['edad'];
    $tipoPrenda = $registro['tipo_prenda'];
    $temporada = $registro['temporada'];
    $ocasion = $registro['ocasion'];
    $formalidad = $registro['formalidad']; 
    $material = $registro['material'];
    $corte = $registro['corte'];

    switch($color)
    {
        case "negro":
            if($ocasion = "playa")
            {
                switch($tipoPrenda)
                {
                    case "playera": 
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (estilo = '$estilo' OR temporada = 'verano' OR ocasion = 'playa')
                        AND (tipo_prenda = 'short' OR tipo_prenda = 'falda')";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                    case "pantalon":
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (temporada = 'verano' OR ocasion = 'playa')
                        AND tipo_prenda = 'playera'";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                    case "short":
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (temporada = 'verano' OR ocasion = 'playa')
                        AND tipo_prenda = 'playera'";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                    case "falda":
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (temporada = 'verano' OR ocasion = 'playa')
                        AND tipo_prenda = 'playera'";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                }
            }
            if($ocasion = "elegante")
            {
                switch($tipoPrenda)
                {
                    case "playera": 
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (estilo = '$estilo' OR temporada = 'verano' OR ocasion = 'playa')
                        AND (tipo_prenda = 'short' OR tipo_prenda = 'falda')";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                    case "pantalon":
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (temporada = 'verano' OR ocasion = 'playa')
                        AND tipo_prenda = 'playera'";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                    case "sueter":
                        $query2 = "SELECT * from productos WHERE genero = '$genero' AND edad = '$edad' AND 
                        formalidad = '$formalidad' AND (temporada = 'verano' OR ocasion = 'playa')
                        AND tipo_prenda = 'playera'";
                        $result2 = mysqli_query($conexion, $query2); 
                        while($registro2 = mysqli_fetch_array($result2));
                        {
                            for($cont = 0; $cont < count($comprado); $cont++)
                            {
                                if($registro2['id_producto'] == $comprado[$cont])
                                {
                                    $p1_id = $registro2['id_producto'];
                                    $flag2 = true;
                                }
                            }
                        }
                    break;
                }
            }
        break;
        case "azul":
        break;
        case "cafe":
        break;
        case "gris":
        break;
        case "verde":
        break;
        case "naranja":
        break;
        case "rosa":
        break;
        case "morado":
        break;
        case "rojo":
        break;
        case "blanco":
        break;
        case "amarillo":
        break;
        case "turquesa":
        break;
        case "magenta":
        break;
        case "lila":
        break;
        case "beige":
        break;
        case "salmón":
        break;
        case "fucsia":
        break;
        case "violeta":
        break;
        case "azul celeste":
        break;
        case "azul marino":
        break;
        case "verde lima":
        break;
        case "verde oscuro":
        break;
        case "mostaza":
        break;
        case "cian":
        break;
        case "vino":
        break;
    }

        echo $registro['nombre_producto'], "<br>";
        echo $registro['genero'], "<br>";
        echo $registro['estilo'], "<br>";
        echo $registro['edad'], "<br>";
        echo $registro['color'], "<br>";
        echo $registro['tipo_prenda'], "<br>";
        echo $registro['temporada'], "<br>";
        echo $registro['ocasion'], "<br>";
        echo $registro['formalidad'], "<br>";
        echo $registro['material'], "<br>";
        echo $registro['corte'], "<br>";
        echo $registro['precio'], "<br>";


?>
 
