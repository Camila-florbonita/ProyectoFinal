var req = new XMLHttpRequest();
var req2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function edicion()
{
    req.onload = function FindPrendas(){
    var selectP = document.getElementById("predit");
    
    selectP.innerHTML = req.responseText;
}
    req.open("GET", "GetPrendaEditar.php?");
    req.send();
    

}, false);

