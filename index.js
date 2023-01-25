
var price = document.getElementById('pay').value;

paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },

    
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: price
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("http://localhost/2022/signup/success.php")
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost/2022/signup/Oncancel.php")
    }
}).render('#paypal-payment-button');