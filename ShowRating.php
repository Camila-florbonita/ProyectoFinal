<?PHP

session_start();

include "database.php";

$calTotal = 0;

$id_p = $_SESSION["id_p"];

    $query = "SELECT * from calificacion WHERE id_producto = '$id_p'";
    $result = mysqli_query($conexion, $query); 

    $cont = 0;
    while ($registro = mysqli_fetch_array($result))
    { 
        $calTotal = $calTotal + $registro["calificacion"];
        $cont++;
}

if($cont == 0)
{
  echo "No hay calificaciones";
}
else
{
    $calif = $calTotal/$cont;
    if ($calif == 1)
      echo $calif." estrella";
    else
      echo $calif." estrellas";
}

?>
 
