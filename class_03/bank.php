<?php
$wallet_Balance = 5000;

function getBalance()
{
   global $wallet_Balance;
   return $wallet_Balance;
}

function deposite($amount)
{
    global $wallet_Balance;

    if ($amount > 0) {
        $wallet_Balance += $amount;
        echo "Deposited : $amount | New Balance: $wallet_Balance\n";
    }
    else{
        echo "invalid Deposit Amount";
    }
}
 
function hassufficienbalace($amount)
 {
    global $wallet_Balance;
    return $wallet_Balance > $amount;

 }  

 function withdraw($amount)
 {
    global $wallet_Balance;

    if($amount > 0){
        if(hassufficienbalace($amount))
        {
            $wallet_Balance -= $amount;
            echo "withdraw: $amount || Remaining Balace : $wallet_Balance\n";
        }
        else{
            echo ("balance nai || Taka Dukan mia || taka ache : $wallet_Balance");
        }
    }
    else {
        echo ("Invalid Amount");
    }
 }
 echo "current Balance:" .getBalance()."\n"; 
 echo("<br>");
 deposite(5000);
 echo("<br>");
 withdraw(6000);
 echo("<br>");
 withdraw(5000);


?>