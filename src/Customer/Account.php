<?php

namespace qahmad\bank\Customer;

class Account {
	private $balance;

	public function __construct(float $balance=0) {
		if ($balance < 0)
			$this->balance = 0;
		else
			$this->balance = $balance;
	}

	public function credit(float $amount=0) {
		if ($amount > 0)
			$this->balance += $amount;
	}

	public function debit(float $amount=0) {
		if ($amount > 0 && ($this->balance - $amount) > 0)
			$this->balance -= $amount;
	}

	public function getBalance() {
		return round($this->balance, 2);
	}
	
}