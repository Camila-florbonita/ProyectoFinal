
<?PHP

include "database.php";

$oferta = $_POST["nombreprenda"];
$id_p = $_POST["POferta"];

$query = "SELECT * from productos WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);
$precio = $registro["precio"];

$ofertaT = ($oferta/100)*$precio;

$ingreso = "INSERT into productos (precio_oferta) VALUES ('$ofertaT') WHERE id_producto = '$id_p'";
mysqli_query($conexion, $ingreso);

header("Location: Ofertas.html");
?>