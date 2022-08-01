
<?PHP

session_start();

include "database.php";

$fecha = date("Y-m-d");
$mes = date("m");
$year = date("Y");
$temporada = "verano";

$datemes = "2022-".$mes."-01";
$dateyear = $year."-01-01";
$inicioT = "$year-06-21";
$finT = "$year-09-21";

$querymes = "SELECT COUNT(*) FROM comprado WHERE fecha >= '$datemes';";
$resultmes = mysqli_query($conexion, $querymes); 
$registromes = mysqli_fetch_array($resultmes);

$queryear = "SELECT COUNT(*) FROM comprado WHERE fecha >= '$dateyear';";
$resultyear = mysqli_query($conexion, $queryear); 
$registroyear = mysqli_fetch_array($resultyear);

$queryT = "SELECT COUNT(*) FROM comprado WHERE fecha >= '$inicioT';";
$resultT = mysqli_query($conexion, $queryT); 
$registrot = mysqli_fetch_array($resultT);

echo "<div id='compras'>
<p>
    Compras este año:
</p>
<p>",
    $registroyear['COUNT(*)'],
"</p>
<p>
    Compras este mes:
</p>
<p>",
$registromes['COUNT(*)'],
"</p>
<p>
    Compras esta temporada:
</p>
<p>",
$registrot['COUNT(*)'],
"</p>
</div>";

?>
 
