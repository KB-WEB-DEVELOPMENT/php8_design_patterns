<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Decorator;

class StringCompressor extends BytesCalculatorDecorator
{
	public function getBytesSize(string $str): int
	{
		$origStr = $str;
		
		$compStr = gzcompress($origStr);
		
		return $this->bytesCalculator->getBytesSize(str:$compStr);		
	}
}