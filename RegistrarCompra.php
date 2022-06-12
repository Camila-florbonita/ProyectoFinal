
<?PHP

session_start();
date_default_timezone_set("America/Mexico_City");

//$id_us = $_SESSION["id_us"];
$id_pr = $_SESSION['id_p'];
$fecha = date("Y-m-d");

$talla = $_POST["talla"];
$action = $_POST["botons"];

$action = "comprar";

include "database.php";
$query = "SELECT * from tallas WHERE id_producto = '$id_pr'";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);

$query2 = "SELECT * from entrega WHERE id_usuario = 1";
$result2 = mysqli_query($conexion, $query2);


if($action == "comprar")
{
    if($result2->num_rows == 0)
    {
        header("Location: InformacionDeEntrega.html");
    }
    else
    {
        echo $registro2;
        $ingreso = "INSERT into comprado (id_usuario, id_producto, fecha, talla) VALUES ('$id_us','$id_pr','$fecha', '$talla')";
        mysqli_query($conexion, $ingreso); 
        echo $fecha;
    }
    
}

if($action == "carrito")
{
    $ingreso = "INSERT into carrito (id_usuario, id_producto, talla) VALUES ('$id_us','$id_pr', '$talla')";
    mysqli_query($conexion, $ingreso); 
    echo "carrito";
}

if($action == "listadeseos")
{
    $ingreso = "INSERT into listadedeseos (id_usuario, id_producto) VALUES ('$id_us','$id_pr')";
    mysqli_query($conexion, $ingreso); 
    echo "carrito";
}

header("Location: ProductoConCuenta.html");

?>

