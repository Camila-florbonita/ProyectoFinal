const reqS = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function Comentarios()
{
     reqS.onload = function ShowComents(){
     var coments = document.getElementById("owo");
    
     coments.innerHTML = reqS.responseText;
}
    reqS.open("GET", "phpapi.php?");
    reqS.send();

}, false);