<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

interface ShapesPropertiesInterface
{
	 public function calculateDiskProperties(int $radius):string;
	 public function calculateRectangleProperties(int $width,int $height):string;
	 public function calculateTriangleProperties(int $side1, int $side2, int $side3):string;
	 public function calculateSquareProperties(int $side):string;
}