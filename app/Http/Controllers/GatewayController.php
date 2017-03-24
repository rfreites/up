<?php

namespace App\Http\Controllers;

use App\Cashier\Omnipay\Omnipay;
use Illuminate\Http\Request;


class GatewayController extends Controller
{
    public function index()
    {

        $gateway = Omnipay::create('NetPay_Api');
        $gateway->setTestMode(TRUE);
        $testUrl = '';
        $gateway->setTestEndpoint($testUrl);
        $merchant_id = '';
        $username = '';
        $password = '';
        $gateway->setMerchantId($merchant_id);
        $gateway->setUsername($username);
        $gateway->setPassword($password);
        //You can set SSL authentication for connection using functions:

        // Create a credit card object
        // DO NOT USE THESE CARD VALUES -- substitute your own
        // see the documentation in the class header.
        $card = array(
            'firstName' => 'Example',
            'lastName' => 'User',
            'number' => '4111111111111111',
            'expiryMonth'           => '01',
            'expiryYear'            => '2020',
            'cvv'                   => '123',
            'billingAddress1'       => '1 Scrubby Creek Road',
            'billingCountry'        => 'AU',
            'billingCity'           => 'Scrubby Creek',
            'billingPostcode'       => '4999',
            'billingState'          => 'QLD',
        );
        // Do an authorisation transaction on the gateway
        $response = $gateway->authorize(array(
            'amount'        => '10.00',
            'currency'      => 'AUD',
            'description'   => 'This is a test authorize transaction.',
            'card'          => $card,
        ))->send();

        if ($response->isSuccessful()) {
//            echo "Authorize transaction was successful!\n";
            // Find the authorization ID
            $auth_id = $response->getTransactionReference();
        }
    }
}
