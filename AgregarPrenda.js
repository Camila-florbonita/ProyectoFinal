function CambiarCorte()
{
    var tipoPrenda = document.getElementById("tipodeprenda").value;
    document.getElementById("corte").disabled = false;
    var ortePantalon = document.getElementById("cortepantalon");
    switch(tipoPrenda)
    {
        case "playera":
            document.getElementById("CortePlayera").disabled = false;
            document.getElementById("CortePantalon").disabled = true;
            document.getElementById("CorteVestido").disabled = true;
            document.getElementById("CorteShort").disabled = true;
            document.getElementById("CorteFalda").disabled = true;
            document.getElementById("CorteSueter").disabled = true;
        break;
        case "pantalon":
            document.getElementById("CortePlayera").disabled = true;
            document.getElementById("CortePantalon").disabled = false;
            document.getElementById("CorteVestido").disabled = true;
            document.getElementById("CorteShort").disabled = true;
            document.getElementById("CorteFalda").disabled = true;
            document.getElementById("CorteSueter").disabled = true;
        break;
        case "vestido":
            document.getElementById("CortePlayera").disabled = true;
            document.getElementById("CortePantalon").disabled = true;
            document.getElementById("CorteVestido").disabled = false;
            document.getElementById("CorteShort").disabled = true;
            document.getElementById("CorteFalda").disabled = true;
            document.getElementById("CorteSueter").disabled = true;
        break;
        case "short":
            document.getElementById("CortePlayera").disabled = true;
            document.getElementById("CortePantalon").disabled = true;
            document.getElementById("CorteVestido").disabled = true;
            document.getElementById("CorteShort").disabled = false;
            document.getElementById("CorteFalda").disabled = true;
            document.getElementById("CorteSueter").disabled = true;
        break;
        case "falda":
            document.getElementById("CortePlayera").disabled = true;
            document.getElementById("CortePantalon").disabled = true;
            document.getElementById("CorteVestido").disabled = true;
            document.getElementById("CorteShort").disabled = true;
            document.getElementById("CorteFalda").disabled = false;
            document.getElementById("CorteSueter").disabled = true;
        break;
        case "sueter":
            document.getElementById("CortePlayera").disabled = true;
            document.getElementById("CortePantalon").disabled = true;
            document.getElementById("CorteVestido").disabled = true;
            document.getElementById("CorteShort").disabled = true;
            document.getElementById("CorteFalda").disabled = true;
            document.getElementById("CorteSueter").disabled = false;
        break;
        default:
            document.getElementById("corte").disabled = true;
        break;
        
    }
}
