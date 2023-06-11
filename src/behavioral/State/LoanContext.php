<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\State;

class LoanContext
{
	private State $state;
	
	private array $loanStatus = [ 'step1of4' => 'REQUESTED (R)',
				      'step2of4' => 'VERIFIED (V)',
				      'step3of4' => 'PAID (P)',
				      'step4of4' => 'CLOSED (C)'
				    ];  

	public function __construct(
		private string $borrowerCodeId
	){}
	
	public static function create(): LoanContext
	 {
		$loan = new self($this->borrowerCodeId);
		
		$loan->state = new StateRequested($this->borrowerCodeId,$this->loanStatus);

		return $loan;
	}

	public function setState(State $state):void
	{
		$this->state = $state;
	}

	public function doNext():void
	{
		$this->state->doNext($this);
	}

	public function printLoanStatus():string
	{
		return $this->state->printLoanStatus();
	}
}
