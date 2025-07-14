<?php

class bankAccount {
    private $balance;

    public function getBalance(){
        return $this->balance;

    }
    public function deposite($amount){
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;

}
    public function isGreaterThenOneYear(){
		$givenDateTime = new DateTime($this->givenDate);
		$currentDateTime = new DateTime();

		$interval = $currentDateTime->diff($givenDateTime);

		if($interval->y > 1 || ($interval->y == 1 && $interval->m > 0) || ($interval->y == 1 && $interval->m == 0 && $interval->d > 0))
		{
			return true;
		}

		else
		{
			return false;
		}
	}
}

class SavingAccount extends bankAccount {
	private $interestRate;
	public $givenDate = "2024-07-06";

	public function calcAnualFee()
	{
		if($this->isGreaterThanOneYear())
		{
			if($this->getBalance() > 200)
			{
				echo "Your Anual Fee of BDT.200 has been adjusted from your account";
				$newBalance = ($this->getBalance() - 200);
				echo "Your C/B is: ".$newBalance;
			}

			else
			{

			}
		}
	}

	public function setInterestRate($interestRate)
	{
		$this->interestRate = $interestRate;
	}

	function addInterest()
	{
		$interest = $this->interestRate * $this->getBalance();
		$this->deposit($interest);
	}

}
?>