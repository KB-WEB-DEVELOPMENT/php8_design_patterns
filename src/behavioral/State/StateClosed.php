<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\State;

class StateClosed implements State
{
	public function __construct(
		private string $borrowerCodeId,
		private array $loanStatus
	){}
		
	public function printLoanStatus():string
	{
		return 'BORROWER CODE ID: #' . $this->borrowerCodeId . ' LOAN STATUS: ' . $this->loanStatus['step4of4'];
	}
}