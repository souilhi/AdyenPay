<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payements</title>
    <script src="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/3.6.3/adyen.js"
   integrity="sha384-sW7LTx7Q+1PgLUEUyxTGnmFsfMuZHDpIoIz2Tds1KroBZiT29OnTXZmV+nGhRxvO"
   crossorigin="anonymous"></script>
 
   <link rel="stylesheet"
  href="https://checkoutshopper-live.adyen.com/checkoutshopper/sdk/3.6.3/adyen.css"
  integrity="sha384-l5/gSrWMFWCKnEqoG1F21fvhDesLnZt/JlXjkA0FWp6E68Pc/9mxg+nPvvx+uB4G"
  crossorigin="anonymous">
  <script>


var  result = <?php echo json_encode($result) ?>;
var paymentMethodsResponse = JSON.parse(result)
console.log(paymentMethodsResponse)


const configuration = {
 
 paymentMethodsResponse: paymentMethodsResponse ,// The `/paymentMethods` response from the server.
 originKey: "pub.v2.8015867685751488.aHR0cHM6Ly9sYXJhdmVsLnNjYWxleGFnZW5jeS5jb20.zrkEil_rHJ-MeHyty0LLn65br16lr092b5njnu0DIdg",
 locale: "en-US",
 environment: "test",
 onSubmit: (state, dropin) => {
     // Your function calling your server to make the `/payments` request
     makePayment(state.data)
       .then(response => {
         if (response.action) {
           // Drop-in handles the action object from the /payments response
           dropin.handleAction(response.action);
         } else {
           // Your function to show the final result to the shopper
           showFinalResult(response);
         }
       })
       .catch(error => {
         throw Error(error);
       });
   },
 onAdditionalDetails: (state, dropin) => {
   // Your function calling your server to make a `/payments/details` request
   makeDetailsCall(state.data)
     .then(response => {
       if (response.action) {
         // Drop-in handles the action object from the /payments response
         dropin.handleAction(response.action);
       } else {
         // Your function to show the final result to the shopper
         showFinalResult(response);
       }
     })
     .catch(error => {
       throw Error(error);
     });
 },
 paymentMethodsConfiguration: {
   card: { // Example optional configuration for Cards
     hasHolderName: false,
     holderNameRequired: true,
     enableStoreDetails: true,
     hideCVC: false, // Change this to true to hide the CVC field for stored cards
     name: 'Credit or debit card'
   }
 }
};
const checkout = new AdyenCheckout(configuration);
const dropin = checkout.create('dropin').mount('#dropin-container'); 
</script>
<!-- <script src="{{ asset('/js/app.js/') }}"></script>  -->
</head>
<body>

<div id="dropin-container"></div>
  <!-- {{var_dump($result)}}  --> 
 {{$result}}  



<!-- curl https://checkout-test.adyen.com/v1/originKeys \
-H "X-API-key: [AQEhhmfuXNWTK0Qc+iSDkWU0ovxsjq/wXJ3AnYwwG0/gN95OEMFdWw2+5HzctViMSCJMYAc=-Ro0ccIWu/5DbjcuDJoMxdi9cesFssQEqJptXyDiHdEw=-,f45zTs4yZT>Y83L
]" \
-H "Content-Type: application/json" \
-d '{
   "originDomains":[
      "https://www.your-company1.com",
      "https://www.your-company2.com",
      "https://www.your-company3.com"
   ]
}' -->


</body>
</html>