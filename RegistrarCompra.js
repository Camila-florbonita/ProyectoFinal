var action;

function comprar()
{
    var action = 1;
    
    req.open("GET", "RegistrarCompra.php?action=" + action);
    req.send();

}

function carrito()
{
    var action = 2;
    
    req.open("GET", "RegistrarCompra.php?action=" + action);
    req.send();

}