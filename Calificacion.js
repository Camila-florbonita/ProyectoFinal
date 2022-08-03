var reqA = new XMLHttpRequest();
var reqX = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function calificacion()
{
     reqA.onload = function calUsuario(){
         var cont = reqA.responseText;
         if(cont != 0)
         {
             for(cont = cont; cont > 0; cont--)
             {
                 if(cont == 1)
                        var nameId = "estrella1";
                if(cont == 2)
                    var nameId = "estrella2";
                if(cont == 3)
                    var nameId = "estrella3";
                if(cont == 4)
                    var nameId = "estrella4";
                if(cont == 5)
                    var nameId = "estrella5";
                 var productImage = document.getElementById(nameId);
                 
                 productImage.src = "https://res.cloudinary.com/cadivie/image/upload/v1654155333/star_sn1c7i.png";
             }   
         }
    }
    reqA.open("GET", "GetCalificacion.php?");
    reqA.send();

}, false);

function cal(cont)
{
    // alert(cont);
    var calif = cont;
    for(cont = cont; cont > 0; cont--)
    {
        var productImage = document.getElementById("estrella" + cont);
        productImage.src = "https://res.cloudinary.com/cadivie/image/upload/v1654155333/star_sn1c7i.png";
    }
   reqX.open("GET", "Calificacion.php?calif=" + calif);
   reqX.send();
}