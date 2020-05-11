<?php

namespace App\Http\Controllers;

use Adyen\{Client, Environment};
use Adyen\Service\Checkout;


/**
 * extends Controller
 * We don't use anything related to controller, no need to extend it
 * With the request too: use Illuminate\Http\Request;
 */
class Payments
{
    private $api_key = 'AQEhhmfuXNWTK0Qc+iSDkWU0ovxsjq/wXJ3AnYwwG0/gN95OEMFdWw2+5HzctViMSCJMYAc=-Ro0ccIWu/5DbjcuDJoMxdi9cesFssQEqJptXyDiHdEw=-,f45zTs4yZT>Y83L';
    //
    public function getPayMethodsPage(){
       // return view('payement');
    }

    public function payMethods(){
        // Set your X-API-KEY with the API key from the Customer Area.
        $client = new Client();
        $client->setXApiKey($this->api_key);
        $client->setEnvironment(Environment::TEST);
        $service = new Checkout($client);

        $params = array(
        "merchantAccount" => "ScalexECOM",
        "countryCode" => "MA",
        "amount" => array(
            "currency" => "EUR",
            "value" => 1000
        ),
        "channel" => "Web"
        );

        // $result = $service->paymentMethods($params);
        // Pass the response to your front end
        // $result = json_encode($result) ;
        // For laravel views, don't return value as JSON
        return view('payement', ['result' => $service->paymentMethods($params)]);
    }


    public function payMeth(){

        // Set your X-API-KEY with the API key from the Customer Area.
        $client = new Client();
        $client->setXApiKey($this->api_key);
        $client->setEnvironment(Environment::TEST);
        $service = new Checkout($client);

        $params = [
            "merchantAccount" => "ScalexECOM",
            "countryCode" => "MA",
            "amount" => [
                "currency" => "EUR",
                "value" => 1000
            ],
            "channel" => "Web"
        ];

        return response()->json(
            [
                'status' => true,
                'code' => 200,
                'methods' => $service->paymentMethods($params)
            ], 200
        );
    }
}

