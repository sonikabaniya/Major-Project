<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <button id="payment-button">Pay with Khalti</button>

        <script>
                var config = {
                    // replace the publicKey with yours
                    "publicKey": "test_public_key_34e29836125b4905a8eb03c92778d524",
                    "productIdentity": "1234567890",
                    "productName": "Dragon",
                    "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                    "eventHandler": {
                        onSuccess (payload) {
                            // hit merchant api for initiating verfication
                            // window.replace()
                            var token = payload.token;
                            var amount = payload.amount;
                            window.location.href = "{{ route('khaltitest') }}"+'?token=' + token + '&amount=' + amount;
                        },
                        onError (error) {
                            console.log(error);
                        },
                        onClose () {
                            console.log('widget is closing');
                        }
                    }
                };
        
                var checkout = new KhaltiCheckout(config);
                var btn = document.getElementById("payment-button");
                btn.onclick = function () {
                    checkout.show({amount: 1000});
                }
            </script>
</body>
</html>