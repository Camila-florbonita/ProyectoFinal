var req = new XMLHttpRequest();

function prenda()
{
     req.onload = function elegirPrenda(){
     var prendas = document.getElementById("producto");
    
     prendas.innerHTML = req.responseText;
}
    req.open("GET", "ElegirPrendaParaManiqui.php?");
    req.send();

}
