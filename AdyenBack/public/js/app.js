
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