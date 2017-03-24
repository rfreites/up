<?php

namespace App\Cashier\Omnipay\NetPay\Message;

use App\Cashier\Omnipay\Common\Message\RequestInterface;

/**
 * NetPay API Delete Token Response
 */
class ApiTokenDeleteResponse extends Response
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
    }
}
