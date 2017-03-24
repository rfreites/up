<?php

namespace App\Cashier\Omnipay\NetPay\Message;

use App\Cashier\Omnipay\Common\Message\RequestInterface;

/**
 * NetPay API Authorize Response
 */
class ApiAuthorizeResponse extends ApiPurchaseResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
    }
}
