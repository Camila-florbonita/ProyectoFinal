const req = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', 
function GetPrice()
{
     req.onload = function trash(){
     var getPrice = req.responseText;
    
}
    req.open("GET", "GetProductPrice.php?");
    req.send();

}, false);

document.addEventListener('DOMContentLoaded',

function paypal()
{
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions)
        {
            return actions.order.create(
                {
                    purchase_units: [{
                        amount: {
                            value: getPrice
                        }
                    }]
                });
        },

        onApprove: function(data, actions)
        {
            actions.order.capture().then(function(detalles)
            {
                console.log(detalles);
                alert("Pago realizado");
                //window.location.href="";
            });
        },

        onCancel: function(data)
        {
            alert("Pago cancelado");
            console.log(data);
        }
    }).render('#paypal-button-container');

}, false);