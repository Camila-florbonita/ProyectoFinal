var req = new XMLHttpRequest();
var req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Ofertas()
{
     req.onload = function ShowProductos(){
     var selectP = document.getElementById("POferta");
    
     selectP.innerHTML = req.responseText;
}
    req.open("GET", "OfertasProductos.php?");
    req.send();

    req2.onload = function SelectProductos(){
      var selectP2 = document.getElementById("Pof2");
     
      selectP2.innerHTML = req2.responseText;
 }
     req2.open("GET", "OfertasSelect.php?");
     req2.send();

}, false);

document.addEventListener('DOMContentLoaded', 
function LimitDate()
{
  
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
  
    document.getElementById("iniciooferta").setAttribute("min", today);
}, false);

function temporadazzz()
{
    var dof = document.getElementById("duracionOferta").value;    
    alert(dof);
    if(dof == "temporadaOf")
    {
        document.getElementById("temporada").setAttribute("style", "visibility: visible;");
        document.getElementById("temporada").disabled = false;
        document.getElementById("iniciooferta").disabled = true;
    }
}

function prendaOferta()
{
  var pre = document.getElementById("POferta").value;
  var seleccion = document.getElementById("Pof2");
  seleccion.options[pre-1].selected = true;
}