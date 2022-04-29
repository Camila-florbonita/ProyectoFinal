
document.addEventListener('DOMContentLoaded', 
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
} , false);