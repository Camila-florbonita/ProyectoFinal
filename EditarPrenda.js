const req = new XMLHttpRequest();


function edicion()
{
    req.onload = function FindPrendas(){
    var prendas = document.getElementById("producto");
    
    prendas.innerHTML = req.responseText;
}
    req.open("GET", "Buscar.php?");
    req.send();
    

}