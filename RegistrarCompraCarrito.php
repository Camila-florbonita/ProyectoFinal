
<?PHP

session_start();
date_default_timezone_set("America/Mexico_City");
include "database.php";


$id_us = $_SESSION["id_us"];
$fecha = date("Y-m-d");

$precioT = $_SESSION['totalCarrito'];


?>

<html>
    <head>
    <link rel="shortcut icon" href="https://res.cloudinary.com/cadivie/image/upload/v1654155910/logo_okravg.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/FormatoCSS.css">
        <link rel="stylesheet" href="css/styleHome.css">
        <link rel="stylesheet" href="css/styleResultados.css">
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
    <div class="page-container">
        <h1 class="labelOfertas">De clic en el botón para pagar sus artículos</h1>   
        <div style="display: flex; place-content: center;" id='paypal-button-container'></div>
    
        <script>

            try {
                document.addEventListener('DOMContentLoaded',


                paypal.Buttons({
                    style:{
                        layout: 'horizontal',
                        color:  'gold',
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
                            // alert(id_transaccion);
                            // alert(email);
                            // alert(id_cliente);
                            var redireccion = "SetCompraCarrito.php?id_t=" + id_transaccion + "&email=" + email + "&id_c=" + id_cliente + "&fecha=" + fecha + "&status=" + status;
                            // alert(redireccion);
                            alert('Pago realizado');
                            window.location.href = redireccion;

                            <?php
                            $tallas = "M";
                            // echo "alert('$tallas');";
                            // echo "alert('", $_SESSION['totalCarrito'], "');";
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
    </div>
        </body>
</html>

<?PHP
//$newTalla = $talla - 1;
  //      $update = "UPDATE tallas SET '$talla' = '$newTalla' WHERE id_producto = '$id_pr'";
?>