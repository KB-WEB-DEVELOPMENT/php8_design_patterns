<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\State;

class StateVerified implements State
{	
	public function __construct(
		private string $borrowerCodeId,
		private array $loanStatus
	){}
	
	public function doNext(LoanContext $context):void
	{
		$context->setState(new StatePaid($this->borrowerCodeId,$this->loanStatus));
	}

	public function printLoanStatus():string
	{
		return 'BORROWER CODE ID: #' . $this->borrowerCodeId . ' LOAN STATUS: ' . $this->loanStatus['step2of4'];
	}
}