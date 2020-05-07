<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Adyen\Client;


class Payments extends Controller
{
    //
    public function getPayMethodsPage(){
       // return view('payement');
    }
    function payMethods(){


        // Set your X-API-KEY with the API key from the Customer Area.
        $client = new Client();
        $client->setXApiKey("AQEhhmfuXNWTK0Qc+iSDkWU0ovxsjq/wXJ3AnYwwG0/gN95OEMFdWw2+5HzctViMSCJMYAc=-Ro0ccIWu/5DbjcuDJoMxdi9cesFssQEqJptXyDiHdEw=-,f45zTs4yZT>Y83L");
        $client->setEnvironment(\Adyen\Environment::TEST);
        $service = new \Adyen\Service\Checkout($client);
        
        $params = array(
        "merchantAccount" => "ScalexECOM",
        "countryCode" => "MA",
        "amount" => array(
            "currency" => "EUR",
            "value" => 1000
        ),
        "channel" => "Web"
        );
        
        $result = $service->paymentMethods($params);
        // Pass the response to your front end
        $result = json_encode($result) ;
        return view('payement', ['result' => $result]);
    }


    ///ffffffffffffff

    function payMeth(){


        // Set your X-API-KEY with the API key from the Customer Area.
         $client = new Client();
        $client->setXApiKey("AQEhhmfuXNWTK0Qc+iSDkWU0ovxsjq/wXJ3AnYwwG0/gN95OEMFdWw2+5HzctViMSCJMYAc=-Ro0ccIWu/5DbjcuDJoMxdi9cesFssQEqJptXyDiHdEw=-,f45zTs4yZT>Y83L");
        $client->setEnvironment(\Adyen\Environment::TEST);
        $service = new \Adyen\Service\Checkout($client);
        
        $params = array(
        "merchantAccount" => "ScalexECOM",
        "countryCode" => "MA",
        "amount" => array(
            "currency" => "EUR",
            "value" => 1000
        ),
        "channel" => "Web"
        );
        
        $respo = $service->paymentMethods($params); 

        
        // Pass the response to your front end
       $respo = json_encode($respo) ;
      
       
     $result = json_decode($respo, true);
     //return response()->json($result, );
     //$result['paymentMethods'][2]['brands'];
    return $result;
    }
}

