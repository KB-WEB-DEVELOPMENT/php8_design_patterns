<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\State;

class StateRequested implements State
{	
	public function __construct(
		private string $borrowerCodeId,
		private array $loanStatus
	){}
	
	public function doNext(LoanContext $context):void
	{
		$context->setState(new StateVerified($this->borrowerCodeId,$this->loanStatus));
	}

	public function printLoanStatus():string
	{
		return 'BORROWER CODE ID: #' . $this->borrowerCodeId . ' LOAN STATUS: ' . $this->loanStatus['step1of4'];
	}
}