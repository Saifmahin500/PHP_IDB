<?php


class BankAccount
{
	private $accountId;
	protected $balance; 
	private $transactions = []; 

	
	public function __construct($accountId, $initialBalance = 0)
	{
		$this->accountId = $accountId;
		$this->balance = $initialBalance;
		
		$this->logTransaction("Account Created", $initialBalance);
	}

	public function getBalance()
	{
		return $this->balance;
	}

	public function getAccountId()
	{
		return $this->accountId;
	}


	public function deposit($amount)
	{
		if ($amount > 0) {
			$this->balance += $amount;
			$this->logTransaction("Deposit", $amount); 
		}
		return $this;
	}

	
	public function withdraw($amount)
	{
		if ($amount > 0 && $amount <= $this->balance) {
			$this->balance -= $amount;
			$this->logTransaction("Withdrawal", $amount); 
			return true;
		}
		
		echo "<p style='color:red;'>Error: Insufficient balance for withdrawal of BDT {$amount}.</p>";
		return false;
	}

	
	public function getTransactionHistory()
	{
		return $this->transactions;
	}

	
	private function logTransaction($type, $amount)
	{
		$this->transactions[] = [
			'timestamp' => date('Y-m-d H:i:s'),
			'type' => $type,
			'amount' => $amount,
			'balance_after' => $this->balance,
		];
	}
}


class SavingAccount extends BankAccount
{
	private $interestRate;
	public $givenDate = "2024-07-06";

	
}




$allAccounts = [];


$allAccounts['1290484'] = new SavingAccount('1290484', 20000); 
$allAccounts['1290485'] = new SavingAccount('1290485', 65000); 



$account1 = $allAccounts['1290484'];
$account1->deposit(100000);    
$account1->withdraw(25000);   
$account1->deposit(30000);    
$account1->withdraw(14000);  



$account1 = $allAccounts['1290485'];
$account1->deposit(50000);    
$account1->withdraw(20000);   
$account1->deposit(30000);    
$account1->withdraw(17000); 










/**
 * এই ফাংশনটি একটি ইউনিক আইডি ব্যবহার করে নির্দিষ্ট অ্যাকাউন্টের সমস্ত তথ্য দেখায়
 *
 * @param string $accountId - যে অ্যাকাউন্টের তথ্য দেখতে চান তার আইডি
 * @param array $accountsDatabase - সকল অ্যাকাউন্টের ডেটাবেস
 */
function checkAccountStatus($accountId, $accountsDatabase)
{
	
	if (isset($accountsDatabase[$accountId])) {
		$account = $accountsDatabase[$accountId];

		echo "<h2>Account Details for ID: " . $account->getAccountId() . "</h2>";
		echo "<p><b>Current Balance: BDT " . number_format($account->getBalance(), 2) . "</b></p>";
		
		echo "<h3>Transaction History</h3>";
		echo "<table border='1' cellpadding='5' cellspacing='0' style='width:100%; border-collapse: collapse;'>";
		echo "<tr style='background-color:#f2f2f2;'><th>Timestamp</th><th>Transaction Type</th><th>Amount (BDT)</th><th>Balance After (BDT)</th></tr>";

		foreach ($account->getTransactionHistory() as $transaction) {
			echo "<tr>";
			echo "<td>" . $transaction['timestamp'] . "</td>";
			echo "<td>" . $transaction['type'] . "</td>";
			echo "<td>" . number_format($transaction['amount'], 2) . "</td>";
			echo "<td>" . number_format($transaction['balance_after'], 2) . "</td>";
			echo "</tr>";
		}

		echo "</table>";

	} else {
		// যদি অ্যাকাউন্ট খুঁজে না পাওয়া যায়
		echo "<h2 style='color:red;'>Error: Account with ID '{$accountId}' not found!</h2>";
	}
}


// একটি ইউনিক আইডি দিয়ে অ্যাকাউন্টের স্ট্যাটাস চেক করি
$idToCheck = '1290484';
checkAccountStatus($idToCheck, $allAccounts);

echo "<hr style='margin: 20px 0;'>";



$idToCheck = '1290485';
checkAccountStatus($idToCheck, $allAccounts);

echo "<hr style='margin: 20px 0;'>";

// ভুল আইডি দিয়ে চেক করে 
// $idToCheck = 'গোলাম রব্বাণী ।Dont Copy';
// checkAccountStatus($idToCheck, $allAccounts);

?>