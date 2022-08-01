<?PHP

session_start();

include "database.php";

$cont = 0;

$f_inicio = $_POST["iniciooferta"];
$f_fin = $_POST["finoferta"];
$labels = "";
$data = "";

$query = "SELECT *, COUNT(*) AS cuenta FROM comprado WHERE fecha >= '$f_inicio' AND fecha <= '$f_fin'
GROUP BY id_producto ORDER BY COUNT(*) DESC LIMIT 3;";
$result = mysqli_query($conexion, $query); 
while ($registro = mysqli_fetch_array($result))
{
    $cont++;
    $labels = $labels.' "'.$registro['id_producto'].'",';
    $data = $data.' '.$registro['cuenta'].',';
}

$antiquery = "SELECT *, COUNT(*) AS cuenta FROM comprado WHERE fecha >= '$f_inicio' AND fecha <= '$f_fin'
GROUP BY id_producto ORDER BY COUNT(*) ASC LIMIT 3;";
$antiresult = mysqli_query($conexion, $antiquery); 

$cont = 0;
while ($antiregistro = mysqli_fetch_array($antiresult))
{
    $cont++;
    $labels = $labels.' "'.$antiregistro['id_producto'].'",';
    $data = $data.' '.$antiregistro['cuenta'].',';
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
                                <li>
                                    <div class="menu-opciones">
                                        <a href="Manual.html">Manual</a>
                                        
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-opciones">
                                        <a href="Informes.html">Informes</a>
                                        
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
                type: 'bar',
                data: {
                  labels: [<?php echo $labels; ?>],
                  datasets: [{
                    label: 'Prendas mas y menos compradas',
                    data: [<?php echo $data; ?>],
                    backgroundColor: [
      'rgba(0, 255, 132, 0.8)',
      'rgba(0, 255, 132, 0.8)',
      'rgba(0, 255, 132, 0.8)',
      'rgba(255, 12, 10, 0.8)',
      'rgba(255, 12, 10, 0.8)',
      'rgba(255, 12, 10, 0.8)'
    ],
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