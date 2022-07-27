
<?PHP

session_start();

include "database.php";

$id_u = $_SESSION["id_us"];
$id_p = $_SESSION["id_p"];


$comprado = [];

$queryC = "SELECT * from comprado WHERE id_usuario = '$id_u'";
    $resultC = mysqli_query($conexion, $queryC); 
    while($registroC = mysqli_fetch_array($resultC))
    {
        $comprado[] = $registroC['id_producto'];
    }

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

    $queryPortion = "SELECT * FROM productos WHERE genero = '$genero' AND edad  = '$edad' AND formalidad = '$formalidad'";

    switch($color)
    {
        case "negro":
            $colour = "";
        break;
        case "azul":
            $colour = " AND (color = 'lila' OR color = 'fucsia' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'blanco' OR color = 'negro' OR color = 'verde' OR color = 'azul')";
        break;
        case "cafe":
            $colour = " AND (color = 'salmon' OR color = 'beige' OR color = 'blanco' OR color = 'negro' 
            OR color = 'gris' OR color = 'cafe')";
        break;
        case "gris":
            $colour = " AND (color = 'vino' OR color = 'mostaza' OR color = 'cafe' OR color = 'rojo'
            OR color = 'blanco' OR color = 'negro' OR color = 'azul marino' OR color = 'gris')";
        break;
        case "verde":
            $colour = " AND (color = 'lila' OR color = 'fucsia' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'azul' OR color = 'turquesa' OR color = 'morado' OR color = 'rosa' OR color = 'violeta'
            OR color = 'azul celeste' OR color = 'verde lima' OR color = 'verde')";
        break;
        case "naranja":
            $colour = " AND (color = 'rosa' OR color = 'violeta' OR color = 'verde lima' OR color = 'turquesa'
            OR color = 'blanco' OR color = 'azul' OR color = 'verde' OR color = 'morado' OR color = 'rojo'
            OR color = 'magenta' OR color = 'azul celeste' OR color = 'cian' OR color = 'naranja')";
        break;
        case "rosa": 
            $colour = " AND (color = 'lila' OR color = 'turquesa' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'blanco' OR color = 'negro' OR color = 'verde' OR color = 'morado' OR color = 'magenta'
            OR color = 'violeta' OR color = 'rosa')";
        break;
        case "morado":
            $colour = " AND (color = 'rosa' OR color = 'fucsia' OR color = 'azul celeste' OR color = 'naranja'
            OR color = 'blanco' OR color = 'negro' OR color = 'verde' OR color = 'beige' OR color = 'cian'
            OR color = 'morado')";
        break;
        case "rojo":
            $colour = " AND (color = 'gris' OR color = 'fucsia' OR color = 'azul marino' OR color = 'naranja'
            OR color = 'blanco' OR color = 'negro' OR color = 'beige' OR color = 'rojo')";
        break;
        case "blanco":
            $colour = "";
        break;
        case "amarillo":
            $colour = " AND (color = 'lila' OR color = 'beige' OR color = 'turquesa' OR color = 'amarillo')";
        break;
        case "turquesa":
            $colour = " AND (color = 'lila' OR color = 'violeta' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'blanco' OR color = 'negro' OR color = 'verde' OR color = 'rosa' OR color = 'amarillo'
            OR color = 'magenta' OR color = 'turquesa')";
        break;
        case "magenta":
            $colour = " AND (color = 'rosa' OR color = 'turquesa' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'azul celeste' OR color = 'magenta')";
        break;
        case "lila":
            $colour = " AND (color = 'rosa' OR color = 'turquesa' OR color = 'verde lima' OR color = 'azul'
            OR color = 'amarillo' OR color = 'azul celeste' OR color = 'verde' OR color = 'lila')";
        break;
        case "beige":
            $colour = "";
        break;
        case "salmon":
            $colour = " AND (color = 'beige' OR color = 'cafe' OR color = 'azul marino' OR color = 'blanco' 
            OR color = 'negro' OR color = 'salmon')";
        break;
        case "fucsia":
            $colour = "";
        break;
        case "violeta":
            $colour = " AND (color = 'turquesa' OR color = 'fucsia' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'rosa' OR color = 'verde' OR color = 'violeta')";
        break;
        case "azul celeste":
            $colour = " AND (color = 'lila' OR color = 'morado' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'magenta' OR color = 'verde' OR color = 'azul celeste')";
        break;
        case "azul marino":
            $colour = " AND (color = 'beige' OR color = 'salmon' OR color = 'rojo' OR color = 'gris'
            OR color = 'blanco' OR color = 'mostaza' OR color = 'azul marino')";
        break;
        case "verde lima":
            $colour = " AND (color = 'lila' OR color = 'fucsia' OR color = 'rosa' OR color = 'naranja'
            OR color = 'azul celeste' OR color = 'azul' OR color = 'verde' OR color = 'cian' OR color = 'turquesa'
            OR color = 'magenta' OR color = 'violeta' OR color = 'verde lima')";
        break;
        case "verde oscuro":
            $colour = " AND (color = 'beige' OR color = 'blanco' OR color = 'verde oscuro')";
        break;
        case "mostaza":
            $colour = " AND (color = 'azul marino' OR color = 'beige' OR color = 'gris' OR color = 'blanco' 
            OR color = 'negro' OR color = 'mostaza')";
        break;
        case "cian":
            $colour = " AND (color = 'morado' OR color = 'fucsia' OR color = 'verde lima' OR color = 'naranja'
            OR color = 'violeta' OR color = 'cian')";
        break;
        case "vino":
            $colour = " AND (color = 'gris' OR color = 'beige' OR color = 'blanco' OR color = 'negro'
            OR color = 'vino')";
        break;
    }

    if($ocasion == "playa")
    {
        $style = " AND (estilo = '$estilo' OR temporada = 'verano' OR ocasion = 'playa')";
        $qty = 2;
        switch($tipoPrenda)
        {
            case "playera": 
                $type1 = " AND (tipo_prenda = 'short' OR tipo_prenda = 'falda')";
            break;
            case "pantalon":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "short":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "falda":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
        }
    }
    elseif($ocasion == "elegante")
    {
        $style = " AND  ocasion = 'elegante'";
        $qty = 3;
        switch($tipoPrenda)
        {
            case "playera": 
                $type1 = " AND tipo_prenda = 'pantalon'";
                $type2 = " AND tipo_prenda = 'sueter'";
            break;
            case "pantalon":
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'sueter'";
            break;
            case "falda":
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'sueter'";
            break;
            case "sueter":
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'pantalon'";
            break;
        }
    }
    elseif($ocasion == "fiesta")
    {
        $style = " AND  (ocasion = 'fiesta' OR estilo = '$estilo')";
        $qty = 2;
        switch($tipoPrenda)
        {
            case "playera": 
                $type1 = " AND (tipo_prenda = 'pantalon' OR tipo_prenda = 'short' OR tipo_prenda = 'falda')";
            break;
            case "pantalon":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "falda":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "short":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "sueter":
                $qty = 3;
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'pantalon'";
            break;
        }
    }
    elseif($ocasion == "deportes")
    {
        $style = " AND ocasion = 'deportes'";
        $qty = 2;
        switch($tipoPrenda)
        {
            case "playera": 
                $type1 = " AND (tipo_prenda = 'pantalon' OR tipo_prenda = 'short' OR tipo_prenda = 'falda')";
            break;
            case "pantalon":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "falda":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "short":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "sueter":
                $qty = 3;
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'pantalon'";
            break;
        }
    }
    elseif($temporada == "invierno" or $temporada == "otono")
    {
        $style = " AND estilo = '$estilo' AND (temporada = 'invierno' OR temporada = 'otono')";
        $qty = 3;
        switch($tipoPrenda)
        {
            case "playera": 
                $type1 = " AND tipo_prenda = 'pantalon'";
                $type2 = " AND tipo_prenda = 'sueter'";
            break;
            case "pantalon":
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'sueter'";
            break;
            case "falda":
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'sueter'";
            break;
            case "sueter":
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'pantalon'";
            break;
        }
    }
    else
    {
        $style = " AND estilo = '$estilo'";
        $qty = 2;
        switch($tipoPrenda)
        {
            case "playera": 
                $type1 = " AND (tipo_prenda = 'pantalon' OR tipo_prenda = 'short' OR tipo_prenda = 'falda')";
            break;
            case "pantalon":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "falda":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "short":
                $type1 = " AND tipo_prenda = 'playera'";
            break;
            case "sueter":
                $qty = 3;
                $type1 = " AND tipo_prenda = 'playera'";
                $type2 = " AND tipo_prenda = 'pantalon'";
            break;
        }
    }

    echo "<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
<img class='imagenprenda' src='ImagenesPrendas/", $registro['id_producto'], ".jpg'>
<p class='nomprodcarrito' id='NombreProducto'>",
    $registro['nombre_producto'],
"</p>
<p class='precprodcarrito'>",
    $registro['precio'],
"</p>
<p class='descprodcarrito'>", $registro['descripcion'],
"</p>
</div>";

    if($tipoPrenda == "vestido")
    {
        echo "Es un vestido, no hay más recomendaciones";
    }
    else
    {
        $i = false;
        $ultQuery = $queryPortion . $colour . $style . $type1;
        $ultResult = mysqli_query($conexion, $ultQuery); 
        while($ultRegistro = mysqli_fetch_array($ultResult))
        {
            for($contX = 0; $contX < sizeof($comprado); $contX++)
            {
                if($comprado[$contX] == $ultRegistro['id_producto'])
                {
                    $i = true;
                    $trueid = $ultRegistro['id_producto'];
                }
            }
        }
        if($i == false)
        {
            echo "No tienes ninguna prenda para combinar, intenta comprar mas prendas";
        }
        else
        {
            echo "<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
            <img class='imagenprenda' src='ImagenesPrendas/", $trueid['id_producto'], ".jpg'>
            <p class='nomprodcarrito' id='NombreProducto'>",
                $trueid['nombre_producto'],
            "</p>
            <p class='precprodcarrito'>",
                $trueid['precio'],
            "</p>
            <p class='descprodcarrito'>",
            "Estilo: ", $trueid['estilo'], "<br>",
            "Genero: ", $trueid['genero'], "<br>",
            "Color: ", $trueid['color'], "<br>",
            "Corte: ", $trueid['corte'], "<br>",
            "</p>
            </div>";
        }
    }
    if($qty == 3)
    {
        $i = false;
        $ultQuery = $queryPortion . $colour . $style . $type2;
        $ultResult = mysqli_query($conexion, $ultQuery); 
        while($ultRegistro = mysqli_fetch_array($ultResult))
        {
            for($contX = 0; $contX < sizeof($comprado); $contX++)
            {
                if($comprado[$contX] == $ultRegistro['id_producto'])
                {
                    $i = true;
                    $trueid = $ultRegistro['id_producto'];
                }
            }
        }
        if($i == false)
        {
            echo "No tienes ninguna prenda para combinar, intenta comprar mas prendas";
        }
        else
        {
            echo "<div class='producto' id='producto' onclick='getProductId(", $registro2['id_producto'],")'>
            <img class='imagenprenda' src='ImagenesPrendas/", $trueid['id_producto'], ".jpg'>
            <p class='nomprodcarrito' id='NombreProducto'>",
                $trueid['nombre_producto'],
            "</p>
            <p class='precprodcarrito'>",
                $trueid['precio'],
            "</p>
            <p class='descprodcarrito'>",
            "Estilo: ", $trueid['estilo'], "<br>",
            "Genero: ", $trueid['genero'], "<br>",
            "Color: ", $trueid['color'], "<br>",
            "Corte: ", $trueid['corte'], "<br>",
            "</p>
            </div>";
        }
    }



?>
 
