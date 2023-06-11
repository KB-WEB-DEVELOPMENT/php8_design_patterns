<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\State;

interface State
{
	 public function doNext(LoanContext $context):void

	 public function printLoanStatus():string
}