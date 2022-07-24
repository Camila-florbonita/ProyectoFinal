const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Ofertas()
{
     req.onload = function ShowProductos(){
     var selectP = document.getElementById("POferta");
    
     selectP.innerHTML = req.responseText;
}
    req.open("GET", "OfertasProductos.php?");
    req.send();

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