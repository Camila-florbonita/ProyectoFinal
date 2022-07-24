<?PHP

session_start();
include "database.php";
$id_u = $_SESSION["id_us"];
$id_p = $_SESSION["id_p"];

$calificacion = $_REQUEST["estrellas"];



$query = "SELECT * from comprado WHERE id_producto = '$id_p' AND id_usuario = '$id_u'";
    $result = mysqli_query($conexion, $query); 
    if ($registro = mysqli_fetch_array($result))
    { 
        $query2 = "SELECT * from calificacion WHERE id_producto = '$id_p' AND id_usuario = '$id_u'";
        $result2 = mysqli_query($conexion, $query2); 
        if ($registro2 = mysqli_fetch_array($result2))
        { 
            echo "<script>     
            alert('Ya calificaste la prenda, no la puedes calificar otra vez');
            </script>";
            echo "<script> window.location.href = 'ProductoConCuenta.html' </script>";
        }
        else
        {
            $ingreso = "INSERT into calificacion (id_usuario, id_producto, calificacion) VALUES ('$id_u','$id_p','$calificacion')";
            mysqli_query($conexion, $ingreso);
            header("Location: ProductoConCuenta.html");
        }    
    }
    else
    {
      echo "<script>     
      alert('No has comprado la prenda, no puedes calificarla');
    </script>";
    echo $id_p;
    echo $id_u;
    }

    ?>
            
        
