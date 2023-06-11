<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\State\Tests;

use php8_design_patterns\Behavioral\State\LoanContext;

use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{

	public function testDefaultStateCreated():void
	{
		$loanContext = LoanContext('XA19656')::create();
		
		$exp = 'BORROWER CODE ID: #XA19656 LOAN STATUS: REQUESTED (R)'; 
		
		$this->assertSame($exp,$loanContext->printLoanStatus());	
	}

	public function testStateVerifiedAfterStateCreated():void
	{
		$loanContext = LoanContext('ZK53298')::create();
		
		$loanContext->doNext();
		
		$exp = 'BORROWER CODE ID: #ZK53298 LOAN STATUS: VERIFIED (R)';
	
		$this->assertSame($exp,$loanContext->printLoanStatus());	
	}
	
	public function testStatePaidAfterStateVerified():void
	{
		$loanContext = LoanContext('SXL845')::create();
		
		$loanContext->doNext();
		$loanContext->doNext();
		
		$exp = 'BORROWER CODE ID: #SXL845 LOAN STATUS: PAID (R)';
	
		$this->assertSame($exp,$loanContext->printLoanStatus());	
	}

	public function testStateClosedAfterStatePaid():void
	{
		$loanContext = LoanContext('QSL641')::create();
		
		$loanContext->doNext();
		$loanContext->doNext();
		$loanContext->doNext();
		
		$exp = 'BORROWER CODE ID: #QSL641 LOAN STATUS: CLOSED (C)';
	
		$this->assertSame($exp,$loanContext->printLoanStatus());			
	}

	public function testStateClosedIsLastState():void
	{
		$loanContext = LoanContext('LGM9571')::create();
		$loanContext->doNext();
		$loanContext->doNext();
		$loanContext->doNext();
		$loanContext->doNext();
		
		$exp = 'BORROWER CODE ID: #LGM9571 LOAN STATUS: CLOSED (C)';
	
		$this->assertSame($exp,$loanContext->printLoanStatus());				
	}
}
