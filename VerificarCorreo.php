<?php

include 'database.php';

if (isset($_GET['correo_electronico']))
{
    $correo_electronico = $_GET['correo_electronico'];
    $query = "SELECT * FROM verificar WHERE correo_electronico = '$correo_electronico' AND status = 1";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) > 0)
    {
        echo "<script> alert('Su correo ya ha sido verificado') </script>"; 
        echo "<script> window.location.href = 'login.html' </script>";
    }
}
else
{
    echo "<script> alert('Hubo un error') </script>"; 
    echo "<script> window.location.href = 'registro.html' </script>"; 
}


?>

<html>
    <head>
        <link rel="shortcut icon" href="https://res.cloudinary.com/cadivie/image/upload/v1654155910/logo_okravg.png">
        <link rel="stylesheet" href="css/FormatoCSS.css">
        <link rel="stylesheet" href="css/styleCuenta.css">
        <link rel="stylesheet" href="css/styleNavegacionConCuenta.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <title>Código de Verificación</title>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .contenedor
            {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 32px;
            }

            .input
            {
                width: 80%;
            }
        </style>

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

        <form class="formularioConfiguracion" action="CodigoVerificacion.php" method="post">
            <h1 class="labelConfigurar">
                Ingresa el código de verificación
            </h1>
            <div class="contenedor">
                <input class="input" type="text" name="verifyCode" minlength="6" maxlength="6">
                <input type="hidden" name="correo_electronico" value="<?php echo $correo_electronico; ?>">
            </div>
            <p>
                <div class="boton">
                    <button class="botonGuardar" type="submit">
                        Aceptar
                    </button>

                </div>
                
            </p>
        </form>
    </body>
</html>