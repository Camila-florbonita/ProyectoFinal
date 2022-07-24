
<?PHP

include "database.php";

$dtz = new DateTimeZone("America/Mexico_City");
$oferta = $_POST["descuento"];
$id_p = $_POST["POferta"];
$inicio = $_POST["iniciooferta"];
$duracion = $_POST["duracionOferta"];
$year = date("Y");


$query = "SELECT * from productos WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);
$precio = $registro["precio"];

$ofertaT = $precio - (($oferta/100)*$precio);

switch($duracion)
{
    case "mes": $fin = date_create($inicio, $dtz);
    date_modify($fin, "+1 month");
    $fin = date_format($fin, "Y-m-d");
    break;
    case "dia": $fin = date_create($inicio, $dtz);
    date_modify($fin, "+1 day");
    $fin = date_format($fin, "Y-m-d");
    break;
    case "temporadaOf": 
        $temp = $_POST["temporada"];
        switch($temp)
        {
            case "primavera": $inicio = "$year-03-20";
            $fin = "$year-06-20";
            break;
            case "verano": $inicio = "$year-06-21";
            $fin = "$year-09-21";
            break;
            case "otono": $inicio = "$year-09-22";
            $fin = "$year-12-20";
            break;
            case "invierno": $inicio = "$year-12-21";
            $year = $year + 1;
            $fin = "$year-03-19";
            break;
        }
    break;
    case "liquidacion": $fin = "";

}

$ingreso = "UPDATE productos SET precio_oferta = '$ofertaT' WHERE id_producto = '$id_p'";
mysqli_query($conexion, $ingreso);
$ingreso = "INSERT INTO ofertas (id_producto, inicio, fin, descuento) VALUES ('$id_p', '$inicio', '$fin', '$oferta')";
mysqli_query($conexion, $ingreso);

header("Location: Ofertas.html");
?>