const reqX = new XMLHttpRequest();

function cal(cont)
{
    var calif = cont;
    for(cont; cont > 0; cont--)
    {
        var productImage = document.getElementById("estrella" + cont);
        productImage.src = "https://res.cloudinary.com/cadivie/image/upload/v1654155333/star_sn1c7i.png";
    }
   reqX.open("GET", "Calificacion.php?calif=" + calif);
   reqX.send();
}