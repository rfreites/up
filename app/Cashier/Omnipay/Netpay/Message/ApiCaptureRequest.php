<?php

namespace App\Cashier\Omnipay\NetPay\Message;

/**
 * NetPay API Capture Authorization Request
 */
class ApiCaptureRequest extends AbstractRequest
{
    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId($value)
    {
        return $this->setParameter('orderId', $value);
    }
    
    public function getData()
    {
        $this->setApiMethod('gateway/transaction');
        
        $this->validate('amount', 'currency', 'orderId');

        $data = $this->getBaseData();
        
        $data['merchant']['operation_type'] = 'CAPTURE';
        
        $data['transaction']['transaction_id'] = $this->createUniqueTransactionId($this->getTransactionId());
        $data['transaction']['amount'] = $this->getAmount();
        $data['transaction']['currency'] = $this->getCurrency();
        $data['transaction']['source'] = 'INTERNET';
        $description = trim(substr($this->getDescription(), 0, 100));
        if(strlen($description) === 0) {
            $description = substr("New order with transaction id ".$this->getTransactionId()." and amount ".$this->getCurrency()." ".$this->getAmount()." has been placed.", 0, 100);
        }
        $data['transaction']['description'] = $description;
        
        $data['order']['order_id'] = $this->getOrderId();

        return $data;
    }

    protected function createResponse($data)
    {
        return $this->response = new ApiCaptureResponse($this, $data);
    }
}