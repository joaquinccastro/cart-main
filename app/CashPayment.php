<?php

require_once("SavePayment.php");
require_once("PaymentInterface.php");

class CashPayment extends SavePayment
implements PaymentInterface
{
    private $amount;

    public function charge($amount)
    {
        $this->amount = $amount;
        $this->save();
    }

    public function save()
    {
        //
    }
}