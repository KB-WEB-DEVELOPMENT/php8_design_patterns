<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

class Rectangle implements GeometricShape
{
	public function __construct(
		private int $width,
		private int $height
	){}

	public function accept(ShapesPropertiesInterface $visitor): string
	{
		$str = $visitor.calculateRectangleProperties(width:$this->width,height:$this->height);
	
		return $str;
	}
}