<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

class Square implements GeometricShape
{
	public function __construct(
		private int $side
	){}

	public function accept(ShapesPropertiesInterface $visitor): string 
	{
		$str = $visitor.calculateSquareProperties(side:$this->side);
	
		return $str;
	}
}
