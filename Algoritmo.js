const genero = ["masculino", "femenino", "unisex"];
const estilo = ["clasico", "vintage", "gotico", "preppy", "urbano", "hipster", "grunge", "natural", "sofisticado", "artsy", "vanguardista", "boho", "romantico", "dramatico", "girly"];
const edad = ["nino", "joven", "adulto"];
const color = ["negro", "azul", "cafe", "gris", "verde", "naranja", "rosa", "morado", "rojo", "blanco", "amarillo", "turquesa", "magenta", "lila", "beige", "salmon", "fucsia", "violeta", "celeste", "marino", "lima", "verdeoscuro", "mostaza", "cian", "vino"];
const tipoPrenda = ["playera", "pantalon", "vestido", "short", "falda", "sueter"];
const temporada = ["primavera", "verano", "otono", "invierno"];
const ocasion = ["playa", "elegante", "deporte", "fiesta"];
const formalidad = ["casual", "semiformal", "formal"];
const material = ["algodon", "poliester", "lana", "seda", "cuero", "mezclilla", "licra", "lino"];
const cortePlayera = ["camiseta", "camisa", "polo", "tanktop", "mangalarga", "croptop"];
const cortePantalon = ["precto", "skinny", "slim", "bota", "pants", "formal", "mallas"];
const corteVestido = ["vrecto", "cinturaalta", "ventubado", "imperio", "asimetrico"];
const corteShort = ["minishort", "bermuda", "tradicional"];
const corteFalda = ["fentubada", "minifalda", "frecta", "tipoa", "circular", "plisada"];
const corteSueter = ["tejido", "saco", "sudadera", "chamarra", "chaleco", "chaqueta"];

const generoValue = [1, 0, .5];
const estiloValue = [.55, .65, .25, .70, .15, .60, .20, .50, .75, .35, .90, .85, .45, .80, .40];
const edadValue = [0, .5, 1];
const colorValue = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
const tipoPrendaValue = [1, 0, .5, 0, 0, 1];
const temporadaValue = [1, .8, .2, 0];
const ocasionValue = [.2, .8, .4, .6];
const formalidadValue = [0, .7, 1];
const materialValue = [0, .8, .1, .3, 1, .9, .7, .2];
const cortePlayeraValue = [.5, 1, .7, .1, .9, 0];
const cortePantalonValue = [.7, .4, .5, .6, .2, 1, 0];
const corteVestidoValue = [.5, .4, .6, .7, .3];
const corteShortValue = [0, 1, .5];
const corteFaldaValue = [.7, .1, .6, .4, .5, .3];
const corteSueterValue = [.3, .7, .4, .5, 0, .6];

let generoVar = 0;
let estiloVar = 0;
let edadVar = 0;
let colorVar = 0;
let tipoPrendaVar = 0;
let temporadaVar = 0;
let ocasionVar = 0;
let formalidadVar = 0;
let materialVar = 0;

let gvar, esvar, edvar, cvar, tpvar, tvar, ovar, fvar, mvar;

let cont, indice1 = 0, indice2 = 0, indice3 = 0, indice4 = 0, indice5 = 0, indice6 = 0, indice7 = 0;


function aumentarGenero()
{
    let example = document.getElementById("genero").value;
    for(cont = 0; cont < genero.length; cont++)
    {
        if(example == genero[cont])
        {
            generoVar = generoVar + generoValue[cont];
            indice1++;
        }
    }
    
}

function showValueGenero()
{
    generoVar = generoVar/indice1;
    console.log(generoVar);
    for(cont = 0; cont < generoValue.length; cont++)
    {
        if(generoVar < generoValue[cont] + .1 && generoVar > generoValue[cont] - .1)
        {
            alert(genero[cont]);
            gvar = genero[cont];
        }
    }
}

function aumentarEstilo()
{
    let example = document.getElementById("estilo").value;
    for(cont = 0; cont < estilo.length; cont++)
    {
        if(example == estilo[cont])
        {
            estiloVar = estiloVar + estiloValue[cont];
            indice2++;
        }
    }
    
}

function showValueEstilo()
{
    estiloVar = estiloVar/indice2;
    console.log(estiloVar);
    for(cont = 0; cont < estiloValue.length; cont++)
    {
        if(estiloVar < estiloValue[cont] + .1 && estiloVar > estiloValue[cont] - .1)
        {
            alert(estilo[cont]);
            esvar = estilo[cont];
        }
    }
}

function aumentarEdad()
{
    let example = document.getElementById("edad").value;
    for(cont = 0; cont < edad.length; cont++)
    {
        if(example == edad[cont])
        {
            edadVar = edadVar + edadValue[cont];
            indice3++;
        }
    }
    
}

function showValueEdad()
{
    edadVar = edadVar/indice3;
    console.log(edadVar);
    for(cont = 0; cont < edadValue.length; cont++)
    {
        if(edadVar < edadValue[cont] + .1 && edadVar > edadValue[cont] - .1)
        {
            alert(edad[cont]);
            edvar = edad[cont];
        }
    }
}

function aumentarTipoPrenda()
{
    let example = document.getElementById("tipodeprenda").value;
    for(cont = 0; cont < tipoPrenda.length; cont++)
    {
        if(example == tipoPrenda[cont])
        {
            tipoPrendaVar = tipoPrendaVar + tipoPrendaValue[cont];
            indice4++;
        }
    }
    
}

function showValueTipoPrenda()
{
    tipoPrendaVar = tipoPrendaVar/indice4;
    console.log(tipoPrendaVar);
    for(cont = 0; cont < tipoPrendaValue.length; cont++)
    {
        if(tipoPrendaVar < tipoPrendaValue[cont] + .1 && tipoPrendaVar > tipoPrendaValue[cont] - .1)
        {
            alert(tipoPrenda[cont]);
            tpvar = tipoPrenda[cont];
        }
    }
}

function aumentarTemporada()
{
    let example = document.getElementById("temporada").value;
    for(cont = 0; cont < temporada.length; cont++)
    {
        if(example == temporada[cont])
        {
            temporadaVar = temporadaVar + temporadaValue[cont];
            indice5++;
        }
    }
    
}

function showValueTemporada()
{
    temporadaVar = temporadaVar/indice5;
    console.log(temporadaVar);
    for(cont = 0; cont < temporadaValue.length; cont++)
    {
        if(temporadaVar < temporadaValue[cont] + .1 && temporadaVar > temporadaValue[cont] - .1)
        {
            alert(temporada[cont]);
            tvar = temporada[cont];
        }
    }
}

function aumentarOcasion()
{
    let example = document.getElementById("ocasion").value;
    for(cont = 0; cont < ocasion.length; cont++)
    {
        if(example == ocasion[cont])
        {
            ocasionVar = ocasionVar + ocasionValue[cont];
            indice6++;
        }
    }
    
}

function showValueOcasion()
{
    ocasionVar = ocasionVar/indice6;
    console.log(ocasionVar);
    for(cont = 0; cont < ocasionValue.length; cont++)
    {
        if(ocasionVar < ocasionValue[cont] + .1 && ocasionVar > ocasionValue[cont] - .1)
        {
            alert(ocasion[cont]);
            ovar = ocasion[cont];
        }
    }
}

function aumentarFormalidad()
{
    let example = document.getElementById("formalidad").value;
    for(cont = 0; cont < formalidad.length; cont++)
    {
        if(example == formalidad[cont])
        {
            formalidadVar = formalidadVar + formalidadValue[cont];
            indice7++;
        }
    }
    
}

function showValueFormalidad()
{
    formalidadVar = formalidadVar/indice7;
    console.log(formalidadVar);
    for(cont = 0; cont < formalidadValue.length; cont++)
    {
        if(formalidadVar < formalidadValue[cont] + .1 && formalidadVar > formalidadValue[cont] - .1)
        {
            alert(formalidad[cont]);
            fvar = formalidad[cont];
        }
    }
}

function maximo()
{
    alert(gvar + " " + esvar + " " + edvar + " " + tpvar + " " + tvar + " " + ovar + " " + fvar);
    console.log(gvar, esvar, edvar, tpvar, tvar, ovar, fvar);
}