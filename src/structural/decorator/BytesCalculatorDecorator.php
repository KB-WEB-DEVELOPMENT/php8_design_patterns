<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Decorator;

abstract class BytesCalculatorDecorator implements BytesCalculator
{
	public function __construct(
		protected BytesCalculator $bytesCalculator
	){}
}