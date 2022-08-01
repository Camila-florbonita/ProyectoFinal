
<?PHP

session_start();

include "database.php";
$id_p = $_SESSION["id_p"];
$genero = array("", "", "");
$estilo = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
$edad = array("", "", "");
$color = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
$tprenda = array("", "", "", "", "", "");
$temporada = array("", "", "", "");
$ocasion = array("", "", "", "");
$formalidad = array("", "", "");
$material = array("", "", "", "", "", "", "", "");

$generoA = array("masculino", "femenino", "unisex");
$estiloA = array("clasico", "vintage", "gotico", "preppy", "urbano", "hipster", "grunge", "natural", "sofisticado", "artsy", "vanguardista", "boho", "romantico", "dramatico", "girly");
$edadA = array("nino", "joven", "adulto");
$colorA = array("negro", "azul", "cafe", "gris", "verde", "naranja", "rosa", "morado", "rojo", "blanco", "amarillo", "turquesa", "magenta", "lila", "beige", "salmon", "fucsia", "violeta", "azul celeste", "azul marino", "verde lima", "verde oscuro", "mostaza", "cian", "vino");
$tprendaA = array("playera", "pantalon", "vestido", "short", "falda", "sueter");
$temporadaA = array("primavera", "verano", "otono", "invierno");
$ocasionA = array("playa", "elegante", "deporte", "fiesta");
$formalidadA = array("casual", "semiformal", "formal");
$materialA = array("algodon", "poliester", "lana", "seda", "cuero", "mezclilla", "licra", "lino");

    $query = "SELECT * from productos WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 
    $registro = mysqli_fetch_array($result);

    $query2 = "SELECT * from tallas WHERE id_producto = '$id_p'";
    $result2 = mysqli_query($conexion, $query2); 
    $registro2 = mysqli_fetch_array($result2);

    for($cont = 0; $cont < count($genero); $cont++)
    {
        if($registro['genero'] == $generoA[$cont])
        {
            $genero[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($estilo); $cont++)
    {
        if($registro['estilo'] == $estiloA[$cont])
        {
            $estilo[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($edad); $cont++)
    {
        if($registro['edad'] == $edadA[$cont])
        {
            $edad[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($color); $cont++)
    {
        if($registro['color'] == $colorA[$cont])
        {
            $color[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($tprenda); $cont++)
    {
        if($registro['tipo_prenda'] == $tprendaA[$cont])
        {
            $tprenda[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($temporada); $cont++)
    {
        if($registro['temporada'] == $temporadaA[$cont])
        {
            $temporada[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($ocasion); $cont++)
    {
        if($registro['ocasion'] == $ocasionA[$cont])
        {
            $ocasion[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($formalidad); $cont++)
    {
        if($registro['formalidad'] == $formalidadA[$cont])
        {
            $formalidad[$cont] = " selected";
        }
    }

    for($cont = 0; $cont < count($material); $cont++)
    {
        if($registro['material'] == $materialA[$cont])
        {
            $material[$cont] = " selected";
        }
    }


echo '<div id="predit">
            <form action="EditarPrenda.php" method="post" enctype="multipart/form-data">
    
            <div class="page-container">
                <div class="image-container">
                    <img id="img-file" class="imgprenda" src="', $registro["ruta"], '">
                    
                </div>
                <div class="form-container">
                    <div class="etiquetas-container">
                        <div class="etiquetas">
                            <input class="input" type="text" name="nombreprenda" placeholder="Nombre de la prenda..." value="', $registro["nombre_producto"], '" required>
                            <input class="input" type="text" name="descprenda" placeholder="Descripcion de la prenda..." value="', $registro["descripcion"], '" required>
                            <input class="input" type="number" min="0" step=".01" name="precio" placeholder="Precio..." value="', $registro["precio"], '" required>
                            <div class="tallas-container">
                                <label for="xs">XS: </label>
                                <input class="input tallas" type="number" min="0" name="nxs" id="xs" value="', $registro2["XS"], '" required>
                            </div>
                            <div class="tallas-container">
                                <label for="s">S: </label>
                                <input class="input tallas" type="number" min="0" name="ns" id="s" value="', $registro2["S"], '" required>
                            </div>
                            <div class="tallas-container">
                                <label for="m">M: </label>
                                <input class="input tallas" type="number" min="0" name="nm" id="m" value="', $registro2["M"], '" required>
                            </div>
                            <div class="tallas-container">
                                <label for="l">L: </label>
                                <input class="input tallas" type="number" min="0" name="nl" id="l" value="', $registro2["L"], '" required>
                            </div>
                            <div class="tallas-container">
                                <label for="xl">XL: </label>
                                <input class="input tallas" type="number" min="0" name="nxl" id="xl" value="', $registro2["XL"], '" required>
                            </div>
                        </div>
                        <div class="etiquetas">
                            <select class="input" name="genero" id="genero" required>
                            <option value="">Genero</option>
                            <option value="masculino"', $genero[0], '>Masculino</option>
                            <option value="femenino"', $genero[1], '>Femenino</option>
                            <option value="unisex"', $genero[2], '>Unisex</option>
                        </select>
                            <select class="input" name="estilo" id="estilo" required>
                            <option value="">Estilo</option>
                            <option value="clasico"', $estilo[0], '>Clasico</option>
                            <option value="vintage"', $estilo[1], '>Vintage</option>
                            <option value="gotico"', $estilo[2], '>Gotico</option>
                            <option value="preppy"', $estilo[3], '>Preppy</option>
                            <option value="urbano"', $estilo[4], '>Urbano</option>
                            <option value="hipster"', $estilo[5], '>Hipster</option>
                            <option value="grunge"', $estilo[6], '>Grunge</option>
                            <option value="natural"', $estilo[7], '>Natural</option>
                            <option value="sofisticado"', $estilo[8], '>Sofisticado</option>
                            <option value="artsy"', $estilo[9], '>Artsy</option>
                            <option value="vanguardista"', $estilo[10], '>Vanguardista</option>
                            <option value="boho"', $estilo[11], '>Boho</option>
                            <option value="romantico"', $estilo[12], '>Romantico</option>
                            <option value="dramatico"', $estilo[13], '>Dramatico</option>
                            <option value="girly"', $estilo[14], '>Girly</option>
                        </select>
                            <select class="input" name="edad" id="edad" required>
                            <option value="">Edad</option>
                            <option value="nino"', $edad[0], '>Niños</option>
                            <option value="joven"', $edad[1], '>Jovenes</option>
                            <option value="adulto"', $edad[2], '>Adultos</option>
                        </select>
                            <select class="input" name="color" id="color" required>
                            <option value="">Color</option>
                            <option value="negro"', $color[0], '>Negro</option>
                            <option value="azul"', $color[1], '>Azul</option>
                            <option value="cafe"', $color[2], '>Café</option>
                            <option value="gris"', $color[3], '>Gris</option>
                            <option value="verde"', $color[4], '>Verde</option>
                            <option value="naranja"', $color[5], '>Naranja</option>
                            <option value="rosa"', $color[6], '>Rosa</option>
                            <option value="morado"', $color[7], '>Morado</option>
                            <option value="rojo"', $color[8], '>Rojo</option>
                            <option value="blanco"', $color[9], '>Blanco</option>
                            <option value="amarillo"', $color[10], '>Amarillo</option>
                            <option value="turquesa"', $color[11], '>Turquesa</option>
                            <option value="magenta"', $color[12], '>Magenta</option>
                            <option value="lila"', $color[13], '>Lila</option>
                            <option value="beige"', $color[14], '>Beige</option>
                            <option value="salmon"', $color[15], '>Salmón</option>
                            <option value="fucsia"', $color[16], '>Fucsia</option>
                            <option value="violeta"', $color[17], '>Violeta</option>
                            <option value="azul celeste"', $color[18], '>Azul celeste</option>
                            <option value="azul marino"', $color[19], '>Azul marino</option>
                            <option value="verde lima"', $color[20], '>Verde lima</option>
                            <option value="verde oscuro"', $color[21], '>Verde oscuro</option>
                            <option value="mostaza"', $color[22], '>Mostaza</option>
                            <option value="cian"', $color[23], '>Cian</option>
                            <option value="vino"', $color[24], '>Vino</option>
                        </select>
                            <select class="input" name="tipodeprenda" id="tipodeprenda" required onchange="CambiarCorte()">
                            <option value="">Tipo de prenda</option>
                            <option class="playera" value="playera"', $tprenda[0], '>Playera</option>
                            <option class="pantalon" value="pantalon"', $tprenda[1], '>Pantalon</option>
                            <option class="vestido" value="vestido"', $tprenda[2], '>Vestido</option>
                            <option class="short" value="short"', $tprenda[3], '>Short</option>
                            <option class="falda" value="falda"', $tprenda[4], '>Falda</option>
                            <option class="sueter" value="sueter"', $tprenda[5], '>Sueter</option>
                        </select>
                            <select class="input" name="temporada" id="temporada">
                            <option value="">Temporada</option>
                            <option value="primavera"', $temporada[0], '>Primavera</option>
                            <option value="verano"', $temporada[1], '>Verano</option>
                            <option value="otono"', $temporada[2], '>Otoño</option>
                            <option value="invierno"', $temporada[3], '>Invierno</option>
                        </select>
                            <select class="input" name="ocasion" id="ocasion">
                            <option value="">Ocasion</option>
                            <option value="playa"', $ocasion[0], '>Playa</option>
                            <option value="elegante"', $ocasion[1], '>Elegante</option>
                            <option value="deporte"', $ocasion[2], '>Deportes</option>
                            <option value="fiesta"', $ocasion[3], '>Fiesta</option>
                        </select>
                            <select class="input" name="formalidad" id="formalidad" required>
                            <option value="">Nivel de formalidad</option>
                            <option value="casual"', $formalidad[0], '>Casual</option>
                            <option value="semiformal"', $formalidad[1], '>Semiformal</option>
                            <option value="formal"', $formalidad[2], '>Formal</option>
                            
                        </select>
                            <select class="input" name="material" id="material" required>
                            <option value="">Material</option>
                            <option value="algodon"', $material[0], '>Algodon</option>
                            <option value="poliester"', $material[1], '>Poliester</option>
                            <option value="lana"', $material[2], '>Lana</option>
                            <option value="seda"', $material[3], '>Seda</option>
                            <option value="cuero"', $material[4], '>Cuero</option>
                            <option value="mezclilla"', $material[5], '>Mezclilla</option>
                            <option value="licra"', $material[6], '>Licra</option>
                            <option value="lino"', $material[7], '>Lino</option>
                        </select>
                            <select class="input" name="corte" id="corte" required disabled>
                            <option value="">Corte</option>
                            <optgroup label="Corte de Playera" id="CortePlayera">
                                <option value="camiseta" id="camiseta">Camiseta</option>
                                <option value="camisa" id="camisa">Camisa</option>
                                <option value="polo" id="polo">Polo</option>
                                <option value="tanktop" id="tanktop">Tank Top</option>
                                <option value="mangalarga" id="mangalarga">Manga Larga</option>
                                <option value="croptop" id="croptop">Crop Top</option>
                            </optgroup>
                            
                            <optgroup label="Corte de Pantalon" id="CortePantalon">
                                <option value="precto" id="precto">Recto</option>
                                <option value="skinny" id="skinny">Skinny</option>
                                <option value="slim" id="slim">Slim</option>
                                <option value="bota" id="bota">Bota</option>
                                <option value="formal" id="formal">Formal</option>
                                <option value="mallas" id="mallas">Mallas</option>
                            </optgroup>
                            
                            <optgroup label="Corte de Vestido" id="CorteVestido">
                                <option value="vrecto" id="vrecto">Recto</option>
                                <option value="cinturaalta" id="cinturaalta">Cintura Alta</option>
                                <option value="ventubado" id="ventubado">Entubado</option>
                                <option value="imperio" id="imperio">Imperio</option>
                                <option value="asimetrico" id="asimetrico">Asimetrico</option>
                            </optgroup>
                            
                            <optgroup label="Corte de Short" id="CorteShort">
                                <option value="minishort" id="minishort">Minishort</option>
                                <option value="bermuda" id="bermuda">Bermuda</option>
                                <option value="tradicional" id="tradicional">Tradicional</option>
                            </optgroup>
                            
                            <optgroup label="Corte de Falda" id="CorteFalda">
                                <option value="fentubada" id="fentubada">Entubada</option>
                                <option value="minifalda" id="minifalda">Minifalda</option>
                                <option value="frecta" id="frecta">Recta</option>
                                <option value="tipoa" id="tipoa">Tipo A</option>
                                <option value="circular" id="circular">Circular</option>
                                <option value="plisada" id="plisada">Plisada</option>
                            </optgroup>
                            
                            <optgroup label="Corte de Sueter" id="CorteSueter">
                                <option value="tejido" id="tejido">Tejido</option>
                                <option value="saco" id="saco">Saco</option>
                                <option value="sudadera" id="sudadera">Sudadera</option>
                                <option value="chamarra" id="chamarra">Chamarra</option>
                                <option value="chaleco" id="chaleco">Chaleco</option>
                                <option value="chaqueta" id="chaqueta">Chaqueta</option>
                            </optgroup>
                            
                        </select>
                            
                        </div>
            </div>

            <div class="select-file">
                <label for="archivo">Imagen de la prenda</label>
                <input type="file" id="archivo" name="archivo" value="', $registro["ruta"], '" accept="image/jpg" onchange="preview(event)">
            </div>
            <button class="primary-button" type="submit">
                Editar prenda
            </button>
            </div>
            </div>
        </form>';


?>

