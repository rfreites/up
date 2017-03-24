<?php namespace App\Cashier\Omnipay\Webinc;
use App\Cashier\Omnipay\Common\AbstractGateway;

/**
 * Created by PhpStorm.
 * User: rfreites
 * Date: 3/23/2017
 * Time: 1:46 PM
 */
class ApiCateway extends AbstractGateway
{
    public function completePurchase(array $options = array())
    {
        // TODO: Implement completePurchase() method.
    }

    public function completeAuthorize(array $options = array())
    {
        // TODO: Implement completeAuthorize() method.
    }

    public function updateCard(array $options = array())
    {
        // TODO: Implement updateCard() method.
    }

    public function getName()
    {
        return 'Webinc API Payment Gateway';
    }
}