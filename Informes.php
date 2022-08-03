
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

echo "
<p class='subtitle graphycs'>
                    Compras este año:
                </p>
                <p class='price'>",
    $registroyear['COUNT(*)'],
"</p>
<p class='subtitle graphycs'>
                    Compras este mes:
                </p>
                <p class='price'>",
$registromes['COUNT(*)'],
"</p>
<p class='subtitle graphycs'>
                    Compras esta temporada:
                </p>
                <p class='price'>",
$registrot['COUNT(*)'],
"</p>
";

?>
 
