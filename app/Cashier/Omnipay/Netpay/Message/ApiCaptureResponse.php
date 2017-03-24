<?php

namespace App\Cashier\Omnipay\NetPay\Message;

use App\Cashier\Omnipay\Common\Message\RequestInterface;

/**
 * NetPay API Capture Authorization Response
 */
class ApiCaptureResponse extends ApiPurchaseResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
    }
}
