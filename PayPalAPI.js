const req4 = new XMLHttpRequest();

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
                            value: 10
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