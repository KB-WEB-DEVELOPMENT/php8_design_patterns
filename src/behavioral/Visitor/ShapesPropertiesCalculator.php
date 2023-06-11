<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor;

// note : in all the following methods, we assume that all given shapes dimension sizes are positive integers and not doing any checks 
class ShapesPropertiesCalculator implements ShapesPropertiesInterface
{

	public function calculateDiskProperties(int $radius): string
	{
		$unrounded_area = pi()*(float)pow($radius,2);
		
		$rounded_area = round($unrounded_area,2);

		$unrounded_perim =  2*pi()*(float)$radius;
		
		$rounded_perim = round($unrounded_perim,2);
		
		return 'Shape:Disk,Area='.$rounded_area.' unit length squared,Perimeter='.$rounded_perim.' unit length'; 
	
	}

	public function calculateRectangleProperties(int $width,int $height): string 
	{
		$area = $width*$height;
		
		$perim = 2*($width+$height);
		
		return 'Shape:Rectangle,Area='.$area.' unit length squared,Perimeter='.$perim.' unit length'; 
		
	}

	public function calculateTriangleProperties(int $side1, int $side2, int $side3): string 
	{
		
		$s = (float)(($side1+$side2+$side3)/2);
		
		$unrounded_area = sqrt($s*(float)($s-$side1)*(float)($s-$side2)*(float)($s-$side3)); 
		
		$rounded_area = round($unrounded_area,2);
		
		$perim = $side1+$side2+$side3;
		
		return 'Shape:Triangle,Area='.$rounded_area.' unit length squared,Perimeter='.$perim.' unit length';
	
	}

	public function calculateSquareProperties(int $side): string
	{
		$area =  pow($side,2);
		
		$perim = 4*$side;
		
		return 'Shape:Square,Area='.$area.' unit length squared,Perimeter='.$perim.' unit length'; 
	}		
}