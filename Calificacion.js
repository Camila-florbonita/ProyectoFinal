const reqX = new XMLHttpRequest();

function cal(cont)
{
    var calif = cont;
    for(cont; cont > 0; cont--)
    {
        document.getElementById("estrella" + cont).setAttribute("style", "background-color: yellow;");
    }
   reqX.open("GET", "Calificacion.php?calif=" + calif);
   reqX.send();
}