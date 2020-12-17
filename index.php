<?php
include('src/autoload.php');

use qahmad\bank\Customer\Account;

echo "This is simple test to run testunit write this in console<br>\n";

echo "vendor\bin\phpunit src/test --bootstrap src/autoload.php<br><br>\n";

$account = New Account(100);

echo "Start with 100 balance: " . $account->getBalance()."<br>\n";

$account->credit(28.50);

echo "Credit 28.50 balance: " . $account->getBalance()."<br>\n";

$account->debit(47.94);

echo "Debit 47.94 balance: " . $account->getBalance()."<br>\n";

$account->credit(70.1);

echo "Credit 70.1 balance: " . $account->getBalance()."<br>\n";
