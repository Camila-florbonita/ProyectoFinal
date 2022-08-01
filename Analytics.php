<?PHP

session_start();

include "database.php";

$cont = 0;

$f_inicio = $_POST["iniciooferta"];
$f_fin = $_POST["finoferta"];
$tipo = $_POST["tipoGrafica"];
$labels = "";
$data = "";

switch($tipo)
{
    case "general":
        $nombreGrafica = "Compras";
        $query = "SELECT *, COUNT(*) AS cuenta from comprado WHERE fecha >= '$f_inicio' 
        AND fecha <= '$f_fin' GROUP BY fecha";
        $result = mysqli_query($conexion, $query);
        while ($registro = mysqli_fetch_array($result))
        { 
            $cont++;
            $labels = $labels.' "'.$registro['fecha'].'",';
            
            $data = $data.' '.$registro['cuenta'].',';
            
        }
    break;
    case "prenda":
        $pr = $_POST["GraficaPrenda"];
        $nombreGrafica = "Prenda ".$pr;
        $query = "SELECT *, COUNT(*) AS cuenta from comprado WHERE fecha >= '$f_inicio' 
        AND fecha <= '$f_fin' AND id_producto = '$pr' GROUP BY fecha";
        $result = mysqli_query($conexion, $query);
        while ($registro = mysqli_fetch_array($result))
        { 
            $cont++;
            $labels = $labels.' "'.$registro['fecha'].'",';
            
            $data = $data.' '.$registro['cuenta'].',';
            
        }
    break;    
    case "estilo":
        $es = $_POST["GraficaEstilo"];
        $nombreGrafica = "Estilo ".$es;
        $query = "SELECT *, COUNT(*) AS cuenta from comprado INNER JOIN productos 
        ON comprado.id_producto = productos.id_producto WHERE fecha >= '$f_inicio' 
        AND fecha <= '$f_fin' AND productos.estilo = '$es' GROUP BY fecha";
        $result = mysqli_query($conexion, $query);
        while ($registro = mysqli_fetch_array($result))
        { 
            $cont++;
            $labels = $labels.' "'.$registro['fecha'].'",';
            
            $data = $data.' '.$registro['cuenta'].',';
            
        }
    break;    
}
         
    
    if($cont == 0)
    {
        $labels = '"No compras"';
        $data = 0;
    }

?>

<html>
    <head>
        <link rel="shortcut icon" href="https://res.cloudinary.com/cadivie/image/upload/v1654155910/logo_okravg.png">
        <link rel="stylesheet" href="css/FormatoCSS.css">
        <link rel="stylesheet" href="css/styleProductoConCuenta.css">
        <link rel="stylesheet" href="css/styleAnalytics.css">
        <link rel="stylesheet" href="css/styleNavegacionAdmin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        <title>Análisis</title>
        <script src="VerificarLogin.js"></script>
        <script src="package/dist/chart.js"></script>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

    <header class="header">
            <div class="wrapper">
                <header>
                    <nav>
                        <input type="checkbox" id="show-search">
                        <input type="checkbox" id="show-menu">
                        <label for="show-menu" class="icono-menu">
                            <abbr title="Menú">
                                <i class="fas fa-bars"></i>
                            </abbr>
                        </label>
                        <div class="content">
                            <div class="brand">
                                <a href="OpcionesAdministrador.html" class="brand-name">
                                    <abbr title="Cadivie">
                                        Cadivie
                                    </abbr>
                                </a>
                            </div>
                            <ul class="links">
                            <li>
                                    <div class="menu-opciones">
                                        <a href="AgregarPrenda.html">Agregar</a>
                                        
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-opciones">
                                        <a href="Analytics.html">Análisis</a>
                                        
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-opciones">
                                        <a href="Ofertas.html">Ofertas</a>
                                        
                                    </div>
                                </li>
                                <div class="contenedor-login">
                                    <a class="boton-login" href="" id="logout">
                                            Cerrar Sesión
                                    </a>
                                </div>
        
                            </ul>
                            <label for="show-search" class="icono-busqueda">
                                <abbr title="Buscar">
                                    <i class="fas fa-search"></i>
                                </abbr>
                            </label>
                        </div>
                        <form class="search-box" action="BusquedaReferenceAdmin.php" method="post">
                            <input class="" name="Busqueda" type="text" placeholder="Buscar..." required>
                            <button class="boton-buscar" type="submit">
                                <abbr title="Buscar">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </abbr>
                            </button>
                        </form>
                    </nav>
                </header>
                
            </div>
    </header>

        <script>
            document.addEventListener('DOMContentLoaded', 
            function Grafica(){
                var graph = document.getElementById("grafica");
              var barChart = new Chart(graph, {
                type: 'line',
                data: {
                  labels: [<?php echo $labels; ?>],
                  datasets: [{
                    label: '<?php echo $nombreGrafica; ?>',
                    data: [<?php echo $data; ?>],
                    borderColor: 'blue'
                  }]
                },
                options: {
                  plugins:{
                  title: {
                    display: true,
                    text: "Compras"
                  }
                },
                scales: {
                  y: {
                    min: 0,
                  }
                }
              }
              });
              }, false)
                
        </script>

        <div class="page-container">
            
            <div class="grafica-container" >
                <canvas id="grafica"></canvas>
            </div>
            
        </div>
        
        <script src="Logout.js"></script>
    </body>
</html>