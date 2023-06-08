<?php

interface TransactionHistory {
    public function logTransaction($amount, $type);
}

class BankAccount implements TransactionHistory {
    private $accountNumber;
    private $balance;
    private $transactionLogs;

    public function __construct($accountNumber, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
        $this->transactionLogs = [];
    }

    // Getter and setter methods
    public function getAccountNumber() {
        return $this->accountNumber;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    // Deposit method
    public function deposit($amount) {
        $this->balance += $amount;
        $this->logTransaction($amount, 'Deposit');
    }

    // Withdraw method
    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $this->logTransaction($amount, 'Withdrawal');
        } else {
            echo "Insufficient balance.";
        }
    }

    // Display account information
    public function displayAccountInfo() {
        echo "Account Number: " . $this->accountNumber . "\n";
        echo "Balance: $" . $this->balance . "\n";
    }

    // Implement the logTransaction method from TransactionHistory interface
    public function logTransaction($amount, $type) {
        $transaction = [
            'amount' => $amount,
            'type' => $type,
            'date' => date('Y-m-d H:i:s')
        ];
        $this->transactionLogs[] = $transaction;
    }

    // Get transaction logs
    public function getTransactionLogs() {
        return $this->transactionLogs;
    }
}

// Create two instances of the BankAccount class
$account1 = new BankAccount('123456789');
$account2 = new BankAccount('987654321', 1000);

// Deposit into account1 and withdraw from account2
$account1->deposit(500);
$account2->withdraw(200);

// Display account information
$account1->displayAccountInfo();
$account2->displayAccountInfo();

// Get transaction logs
$logs1 = $account1->getTransactionLogs();
$logs2 = $account2->getTransactionLogs();

// Display transaction logs
echo "Transaction Logs for Account 1:\n";
foreach ($logs1 as $log) {
    echo "Amount: $" . $log['amount'] . ", Type: " . $log['type'] . ", Date: " . $log['date'] . "\n";
}

echo "Transaction Logs for Account 2:\n";
foreach ($logs2 as $log) {
    echo "Amount: $" . $log['amount'] . ", Type: " . $log['type'] . ", Date: " . $log['date'] . "\n";
}
