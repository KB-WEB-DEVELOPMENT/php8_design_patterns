<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

class Disk implements GeometricShape
{
	public function __construct(
		private int $radius
	){}

	public function accept(ShapesPropertiesInterface $visitor): string
	{
		$str = $visitor.calculateDiskProperties(radius:$this->radius);
	
		return $str;
	}
}
