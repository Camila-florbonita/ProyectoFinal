const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Analytics()
{
     req.onload = function ShowProductos(){
     var selectP = document.getElementById("GraficaPrenda");
    
     selectP.innerHTML = req.responseText;
}
    req.open("GET", "OfertasProductos.php?");
    req.send();

}, false);

function showSelectGraph()
{
  var tGrafica = document.getElementById("TGrafica").value;
  alert(tGrafica);
  if(tGrafica == "prenda")
  {
    document.getElementById("GraficaPrenda").disabled = false;
  }
  else
  {
    if(tGrafica == "estilo")
    {
      document.getElementById("GraficaEstilo").disabled = false;
    }
    else
    {
      enableDate();
    }
  }
}

function enableDate()
{
  alert(document.getElementById("GraficaPrenda").value);
  var today = new Date();
  var dd = today.getDate()-1;
  var mm = today.getMonth()+1;
  var yyyy = today.getFullYear();
  if(dd<10){
    dd='0'+dd
  } 
  if(mm<10){
    mm='0'+mm
  } 
  
  today = yyyy+'-'+mm+'-'+dd;

  document.getElementById("inicioOferta").setAttribute("max", today);
  document.getElementById("inicioOferta").disabled = false;
}

function enableEnd()
{
  var minFecha = document.getElementById("inicioOferta").value;

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1;
  var yyyy = today.getFullYear();
  if(dd<10){
    dd='0'+dd
  } 
  if(mm<10){
    mm='0'+mm
  } 
  
  today = yyyy+'-'+mm+'-'+dd;

  document.getElementById("finOferta").setAttribute("min", minFecha);
  document.getElementById("finOferta").setAttribute("max", today);
  document.getElementById("finOferta").disabled = false;
}

function enableBotonGrafica()
{
  document.getElementById("verGrafica").disabled = false;
}

function Grafica(){
  var graph = document.getElementById("grafica");
var barChart = new Chart(graph, {
  type: 'line',
  data: {
    labels: ["Fecha inicial", "Fecha", "Fecha", "Fecha", "Fecha", "Fecha", "Fecha", "Fecha", "Fecha", "Fecha final"],
    datasets: [{
      label: 'Prenda 1',
      data: [8, 13, 15, 16, 14, 9, 12, 11, 12, 13],
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
}