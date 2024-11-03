<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

class Triangle implements GeometricShape
{
	public function __construct(
		private int $side1,
		private int $side2,
		private int $side3
	){}

	public function accept(ShapesPropertiesInterface $visitor): string 
	{
		$str = $visitor->calculateTriangleProperties(side1:$this->side1,side2:$this->side2,side3:$this->side3);
	
		return $str;
	}
}
