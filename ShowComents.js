const reqS = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Comentarios()
{
     reqS.onload = function ShowComents(){
     var coments = document.getElementById("comentarios");
    
     coments.innerHTML = reqS.responseText;
}
    reqS.open("GET", "ShowComents.php?");
    reqS.send();

}, false);