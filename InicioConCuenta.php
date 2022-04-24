<?php

require 'database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id_producto, nombre_producto, precio FROM productos"); // WHERE activo=1
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC); // LO VA A ASOCIAR MEDIANTE EL NOMBRE DE CADA COLUMNA

?>

<html>
    <head>
        <link rel="stylesheet" href="css/FormatoCSS.css">
        <link rel="stylesheet" href="css/styleHome.css">
        <title>Pagina de inicio</title>
    </head>
    <body>

        <header class="header">
            <img class="logo" src="img/logo_provisional.jpg">
            <form class="buscar" action="#">
                <input class="busqueda" type="text" placeholder="Buscar">
                <button class="lupa" type="submit">
                    <img src="img/lupa.png">
                </button>
            </form>
            <span class="companyname">
                FashionChoice
            </span>
            <ul class="cuentas">
                <li class="cue">
                    <a href="">
                        <img class="iconocuenta" src="img/cuentaicono.png">
                    </a>
                    <ul class="cuenta">
                        <li class="cuentaelemento">
                            <a href="HistorialDeCompras.html">
                                Historial
                            </a>
                        </li >
                        <li class="cuentaelemento">
                            <a href="ListaDeDeseos.html">
                                Lista de deseos
                            </a>
                        </li>
                        <li class="cuentaelemento">
                            <a href="ConfiguracionCuenta.html">
                                Configuracion
                            </a>
                        </li>
                        <li class="cuentaelemento">
                            <a href="">
                                Cerrar sesion
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <a href="CarritoDeCompras.html" class="carrito">
                <img src="img/carritodecompras.png">
            </a>
        </header>
    

        <ul class="menu">
            <li class="sub">
                <a href="">
                    Prenda
                </a>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Playeras
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Pantalones
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Vestidos
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Shorts
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Faldas
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Sueteres
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub">
                <a href="">
                    Temporada
                </a>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Primavera
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Verano
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Otoño
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Invierno
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub">
                <a href="">
                    Estilo
                </a>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Clasico
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Vintage
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Gotico
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Preppy
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Urbano
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Hipster
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Grunge
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Natural
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Sofisticado
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Artsy
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Vanguardista
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Boho
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Romantico
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Dramatico
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Girly
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub">
                <a href="">
                    Ocasion
                </a>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Playa
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Elegante
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Deportivo
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Fiesta
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub">
                <a href="">
                    Maniqui 3D
                </a>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Combinar atuendo
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Poner al maniqui
                        </a>
                    </li>
                </ul>
            </li>
        </ul>


        <a href="">
            <img class="banner" src="img/banner_provisional.jpg">
        </a>


        <div class="container">
            <p class="labelOfertas">
                Ofertas
            </p>
            <div class="sugerencias">
                <?php foreach($resultado as $row) { ?>
                <div class="elemento">
                    <a href="">
                        <?php

                        $id = $row['id_producto'];
                        $imagen = "ImagenesPrendas/$id.jpg";

                        if (!file_exists($imagen))
                        {
                            $imagen = "img/ofertas_provisional.jpg";
                        }

                        ?>
                        <img class="imagenElemento" src="<?php echo $imagen; ?>">
                        <p class="labelElemento">
                            <?php echo $row['nombre_producto']; ?>
                        </p>
                        <p class="labelPrecio">
                            $ <?php echo number_format($row['precio'], 2, '.', ','); ?>
                        </p>
                    </a>
                </div>
                <?php } ?>
                
            </div>
        </div>

        <div class="container">
            <p class="labelOfertas">
                Recomendaciones
            </p>
            <div class="sugerencias">

                <div class="elemento">
                    <a href="">
                        <img class="imagenElemento" src="img/maspopular_provisional.jfif">
                        <p class="labelElemento">
                            Descripcion
                        </p>
                        <p class="labelPrecio">
                            $ Precio
                        </p>
                    </a>
                </div>
                <div class="elemento">
                    <a href="">
                        <img class="imagenElemento" src="img/maspopular_provisional.jfif">
                        <p class="labelElemento">
                            Descripcion
                        </p>
                        <p class="labelPrecio">
                            $ Precio
                        </p>
                    </a>
                </div>
                <div class="elemento">
                    <a href="">
                        <img class="imagenElemento" src="img/maspopular_provisional.jfif">
                        <p class="labelElemento">
                            Descripcion
                        </p>
                        <p class="labelPrecio">
                            $ Precio
                        </p>
                    </a>
                </div>
                <div class="elemento">
                    <a href="">
                        <img class="imagenElemento" src="img/maspopular_provisional.jfif">
                        <p class="labelElemento">
                            Descripcion
                        </p>
                        <p class="labelPrecio">
                            $ Precio
                        </p>
                    </a>
                </div>
                <div class="elemento">
                    <a href="">
                        <img class="imagenElemento" src="img/maspopular_provisional.jfif">
                        <p class="labelElemento">
                            Descripcion
                        </p>
                        <p class="labelPrecio">
                            $ Precio
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <footer class="footer">
            <a class="foot" href="">
                Aviso legal
            </a>
            <a class="foot" href="">
                Politica de privacidad
            </a>
            <p class="foot">
                No se que mas vaya aqui :P
            </p>
        </footer>
    </body>
</html>