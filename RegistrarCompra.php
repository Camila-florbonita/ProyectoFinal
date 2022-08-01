
<?PHP

session_start();
date_default_timezone_set("America/Mexico_City");
include "database.php";


$id_us = $_SESSION["id_us"];
$id_pr = $_SESSION['id_p'];
$fecha = date("Y-m-d");

$np = $_POST["nprendas"];
$talla = $_POST["talla"];
$action = $_POST["botons"];
$_SESSION["nprendas"] = $np;
$_SESSION["talla"] = $talla;

$precioT = 0;

$query = "SELECT * from tallas WHERE id_producto = '$id_pr'";
$result = mysqli_query($conexion, $query); 
$registro = mysqli_fetch_array($result);

$query3 = "SELECT * from productos WHERE id_producto = '$id_pr'";
$result3 = mysqli_query($conexion, $query3); 
$registro3 = mysqli_fetch_array($result3);

if($registro3["precio_oferta"] != 0)
{
    $precio = $registro3["precio_oferta"];
}
else
{
    $precio = $registro3["precio"];
}

for($cont = 0; $cont < $np; $cont++)
{
    $precioT = $precioT + $precio;
}

$_SESSION['precio'] = $precio;

$query2 = "SELECT * from entrega WHERE id_usuario = $id_us";
$result2 = mysqli_query($conexion, $query2);



if($action == "comprar")
{
    if($result2->num_rows == 0)
    {
        echo "Me quiero matar";
        header("Location: InformacionDeEntrega.html");
    }
    else
    {
        if($registro["$talla"] < $np)
        {
            echo "<script>
            alert('No hay suficientes prendas, elige un numero menor de prendas');
            window.location.href = 'ProductoConCuenta.html';
            </script>";
        }
        $ingreso = "INSERT into pedidos (id_usuario, id_producto, fecha, talla, precio, cantidad) 
        VALUES ('$id_us','$id_pr','$fecha', '$talla', '$precio', '$np')";
        mysqli_query($conexion, $ingreso); 
        
    }
    
}

if($action == "carrito")
{
    if($registro["$talla"] < $np)
    {
        echo "<script>
        alert('No hay suficientes prendas, elige un numero menor de prendas');
        window.location.href = 'ProductoConCuenta.html';
        </script>";
    }
    else
    {
        for($cont = 0; $cont < $np; $cont++)
        {
            $ingreso = "INSERT into carrito (id_usuario, id_producto, talla) VALUES ('$id_us','$id_pr', '$talla')";
            mysqli_query($conexion, $ingreso); 
            echo "carrito";   
        }
        header("Location: ProductoConCuenta.html");
    }
    
    
}

if($action == "listadeseos")
{
    $queryLD = "SELECT * from listadedeseos WHERE id_producto = '$id_pr' AND id_usuario = '$id_us'";
    $resultLD = mysqli_query($conexion, $queryLD); 
    if($registroLD = mysqli_fetch_array($resultLD))
    {
        echo "<script>
        alert('Ya has guardado esta prenda en tu lista de deseos');
        window.location.href = 'ProductoConCuenta.html';
        </script>";
    }
    else
    {
        $ingreso = "INSERT into listadedeseos (id_usuario, id_producto) VALUES ('$id_us','$id_pr')";
        mysqli_query($conexion, $ingreso); 
        echo "carrito";
        header("Location: ProductoConCuenta.html");
    }    
}



?>

<html>
    <head>
    <link rel="shortcut icon" href="https://res.cloudinary.com/cadivie/image/upload/v1654155910/logo_okravg.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/FormatoCSS.css">
        <link rel="stylesheet" href="css/styleSesion.css">
        <link rel="stylesheet" href="css/styleNavegacionConCuenta.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <script src="https://www.paypal.com/sdk/js?client-id=AbrbjYzSiUJ8bo2JLT7y-IeWAjwfpOOITl3gwdu6-0j2zET21JTpPe4bven5HaUP-gFKh2lQ3hUjAEgv&currency=MXN"></script>
    </head>
    <body>
    <header class="header">
            <div class="wrapper">
                <nav>
                    <div class="content">
                        <div class="brand">
                            <a href="InicioConCuenta.html" class="brand-name">
                                    Cadivie
                            </a>
                        </div>
                </nav>
            </div>
        
        </header>

    
<div id='paypal-button-container'></div>
    
    <script>

        try {
            document.addEventListener('DOMContentLoaded',


            paypal.Buttons({
                style:{
                    layout: 'horizontal',
                    color:  'silver',
                    shape:  'pill',
                    tagline: 'false',
                    label:  'paypal'
                },
                createOrder: function(data, actions)
                {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: <?php echo $precioT ?>
                            }
                        }]
                    });
                },
                onApprove: function(data, actions)
                {
                        let url = ''
                    actions.order.capture().then(function(detalles)
                    {
                        const item = {
                            detalles: {
                                id: detalles.id,
                                purchase_units: detalles.purchase_units[0].amount.value,
                                status: detalles.status,
                                update_time: detalles.update_time,
                                payer: {
                                    email_address: detalles.payer.email_address, 
                                    payer_id: detalles.payer.payer_id
                                }
                            }
                        };

                        console.log(JSON.stringify(item));
                        console.log(detalles);
                        console.log(url);
                        var stringJSON = JSON.stringify(item);
                        var info = JSON.parse(stringJSON);
                        var id_transaccion = info.detalles.id;
                        var email = info.detalles.payer.email_address;
                        var id_cliente = info.detalles.payer.payer_id;
                        var status = info.detalles.status;
                        var fecha = info.detalles.update_time;
                        alert(id_transaccion);
                        alert(email);
                        alert(id_cliente);
                        var redireccion = "SetDatosCompra.php?id_t=" + id_transaccion + "&email=" + email + "&id_c=" + id_cliente + "&fecha=" + fecha + "&status=" + status;
                        alert(redireccion);
                        alert('Pago realizado');
                        window.location.href = redireccion;

                        <?php
                        $tallas = $registro["M"];
                        echo "alert('$tallas');";
                        echo "alert('", $_SESSION['talla'], "');";
                        //echo "window.location.href='InicioConCuenta.html';";
                        ?>
                        
                        return fetch(url,
                        {
                            method: 'POST',
                            headers: 
                            {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(item)
                        }).catch( err => {
                            alert(err);
                        });
                    });
                    //window.location.href="InicioConCuenta.html";
                    
                },

                onCancel: function(data)
                {
                    alert('Pago cancelado');
                    console.log(data);
                },
                onError: function (err) 
                {
                    alert('Ha sucedido un error, intente de nuevo');
                }
            }).render('#paypal-button-container'), false);
            
        } catch (error) {
            console.log(error);
        }
    </script>
        </body>
</html>

<?PHP
//$newTalla = $talla - 1;
  //      $update = "UPDATE tallas SET '$talla' = '$newTalla' WHERE id_producto = '$id_pr'";
?>