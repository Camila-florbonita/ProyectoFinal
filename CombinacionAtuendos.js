const req = new XMLHttpRequest();
const req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function combinacion()
{
     req.onload = function Prendas(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "CombinacionAtuendos.php?");
    req.send();

}, false);

function selectPrenda(id_p)
{
    var sendid = id_p;

    req.onload = function Combinar(){
        var prendas = document.getElementById("producto");
       
        prendas.innerHTML = req.responseText;
   }

    req.open("GET", "AlgoritmoAtuendos.php?id=" + sendid);
    req.send();

}