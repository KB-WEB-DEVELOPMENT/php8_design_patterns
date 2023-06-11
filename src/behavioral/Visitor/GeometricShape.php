<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

interface GeometricShape
{
	 public function accept(ShapesPropertiesInterface $visitor):string;
}