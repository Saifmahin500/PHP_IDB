<?php

abstract class PaymentGetway
{
    protected $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }
    abstract public function processPayment();

    public function paymentSuccess(){
        return "payment of {$this->amount} Bdt is successful";
    }
}

class BkashPayment extends PaymentGetway
{
    public function processPayment(){
        return "processing bkash payment of {$this->amount}Bdt...";
    }
}

class NagadPayment extends PaymentGetway
{
    public function processPayment(){
        return "processing Nagad payment of {$this->amount}Bdt...";
    }
}

class RoketPayment extends PaymentGetway
{
    public function processPayment(){
        return "processing Roket payment of {$this->amount}Bdt...";
    }
}

$bkash = new BkashPayment(1000);
echo $bkash->processPayment();
echo $bkash->paymentSuccess()."<br>";

$nagad = new NagadPayment(5000);
echo $nagad ->processPayment();
echo $nagad ->paymentSuccess()."<br>";

$roket = new RoketPayment(2000);
echo $roket->processPayment();
echo $roket->paymentSuccess()."<br>";

?>