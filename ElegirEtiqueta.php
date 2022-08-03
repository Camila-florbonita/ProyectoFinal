
<?PHP

session_start();

include "database.php";

$etiqueta = $_REQUEST["etq"];

if($etiqueta == "genero")
{
    echo '
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Genero</option>
    <option value="masculino">Masculino</option>
    <option value="femenino">Femenino</option>
    <option value="unisex">Unisex</option>
    </select>';
    
}

if($etiqueta == "estilo")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Estilo</option>
    <option value="artsy">Artsy</option>
    <option value="boho">Boho</option>
    <option value="clasico" onclick="getValue("unisex")">Clasico</option>
    <option value="dramatico">Dramatico</option>
    <option value="girly">Girly</option>
    <option value="gotico">Gotico</option>
    <option value="grunge">Grunge</option>
    <option value="hipster">Hipster</option>
    <option value="natural">Natural</option>
    <option value="preppy">Preppy</option>
    <option value="romantico">Romantico</option>
    <option value="sofisticado">Sofisticado</option>
    <option value="urbano">Urbano</option>
    <option value="vanguardista">Vanguardista</option>
    <option value="vintage" onclick="getValue("unisex")">Vintage</option>
    </select>';

}

if($etiqueta == "edad")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Edad</option>
    <option value="nino">Niños</option>
    <option value="joven">Jovenes</option>
    <option value="adulto">Adultos</option>
    </select>';
}

if($etiqueta == "color")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Color</option>
    <option value="amarillo">Amarillo</option>
    <option value="azul">Azul</option>
    <option value="azul celeste">Azul celeste</option>
    <option value="azul marino">Azul marino</option>
    <option value="beige">Beige</option>
    <option value="blanco">Blanco</option>
    <option value="cafe">Café</option>
    <option value="cian">Cian</option>
    <option value="fucsia">Fucsia</option>
    <option value="gris">Gris</option>
    <option value="lila">Lila</option>
    <option value="magenta">Magenta</option>
    <option value="morado">Morado</option>
    <option value="mostaza">Mostaza</option>
    <option value="naranja">Naranja</option>
    <option value="negro">Negro</option>
    <option value="rojo">Rojo</option>
    <option value="rosa">Rosa</option>
    <option value="turquesa">Turquesa</option>
    <option value="verde">Verde</option>
    <option value="verde lima">Verde lima</option>
    <option value="verde oscuro">Verde oscuro</option>
    <option value="vino">Vino</option>
    <option value="violeta">Violeta</option>
    <option value="salmon">Salmón</option>
    </select>';

}

if($etiqueta == "prenda")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Tipo de prenda</option>
    <option class="playera" value="playera">Playera</option>
    <option class="pantalon" value="pantalon">Pantalon</option>
    <option class="vestido" value="vestido">Vestido</option>
    <option class="short" value="short">Short</option>
    <option class="falda" value="falda">Falda</option>
    <option class="sueter" value="sueter">Sueter</option>
    </select>';
    
}

if($etiqueta == "temporada")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Temporada</option>
    <option value="primavera">Primavera</option>
    <option value="verano">Verano</option>
    <option value="otono">Otoño</option>
    <option value="invierno">Invierno</option>
    </select>';
    
}

if($etiqueta == "ocasion")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Ocasion</option>
    <option value="deporte">Deportes</option>
    <option value="elegante">Elegante</option>
    <option value="fiesta">Fiesta</option>
    <option value="playa">Playa</option>
    </select>';
    
}

if($etiqueta == "formalidad")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Nivel de formalidad</option>
    <option value="casual">Casual</option>
    <option value="semiformal">Semiformal</option>
    <option value="formal">Formal</option>
    </select>';
    
}

if($etiqueta == "material")
{
    echo'
    <select class="input" name="etiqueta" id="etiqueta" required>
    <option value="">Material</option>
    <option value="algodon">Algodon</option>
    <option value="cuero">Cuero</option>
    <option value="lana">Lana</option>
    <option value="licra">Licra</option>
    <option value="lino">Lino</option>
    <option value="mezclilla">Mezclilla</option>
    <option value="poliester">Poliester</option>
    <option value="seda">Seda</option>
    </select>';
    
}

?>

