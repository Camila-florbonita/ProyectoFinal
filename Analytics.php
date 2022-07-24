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
        <link rel="stylesheet" href="css/styleCuenta.css">
        <title>Analytics</title>
        <script src="package/dist/chart.js"></script>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <header class="header">
            <a href="OpcionesAdministrador.html">
                <abbr title="Cadivie">
                    <img class="logo" src="https://res.cloudinary.com/cadivie/image/upload/v1654155910/logo_okravg.png">

                </abbr>
            </a>
            <a href="OpcionesAdministrador.html">
                <span class="companyname">
                    Cadivie
                </span>
            </a>
            <button class="logout" id="logout">
                Cerrar Sesión
            </button>
        </header>

        <nav>
            <div class="menuadmin">
                <ul>
                    <li>
                        <a class="edprenda" href="EditarPrenda.html">
                            
                                Editar
                        </a>

                    </li>
                    <li>
                        <a class="analitics" href="Analytics.html">
                            
                                Analitics
                            
                        </a>

                    </li>
                    <li>
                        <a class="ofer" href="Ofertas.html">
                            
                                Ofertas
                                
                            </a>

                    </li>
                </ul>
            </div>
            
        </nav>

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


        <div class="graficaContainer" >
            <canvas id="grafica"></canvas>
        </div>
        <script src="Logout.js"></script>
    </body>
</html>