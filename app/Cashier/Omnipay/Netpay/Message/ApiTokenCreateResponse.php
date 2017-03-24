<?php

namespace App\Cashier\Omnipay\NetPay\Message;

use App\Cashier\Omnipay\Common\Message\RequestInterface;

/**
 * NetPay API Create Token Response
 */
class ApiTokenCreateResponse extends Response
{
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
    }
    
    public function getToken()
    {
        return ((isset($this->data->result) && $this->data->result === 'SUCCESS')?$this->data->token:null);
    }
}
