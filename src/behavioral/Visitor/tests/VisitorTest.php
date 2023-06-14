<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Visitor\Tests;

use php8_design_patterns\Behavioral\Visitor\Disk;
use php8_design_patterns\Behavioral\Visitor\Rectangle;
use php8_design_patterns\Behavioral\Visitor\Triangle;
use php8_design_patterns\Behavioral\Visitor\Square;

use php8_design_patterns\Behavioral\Visitor\ShapesPropertiesCalculator;

use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    public function testCanCalculateShapeProps():void
    {   
	    
	$shapesPropsCalculator = new ShapesPropertiesCalculator();
		
	$diskObj = new Disk(radius:5);
	$rectObj = new Rectangle(width:4,height:3);
	$triangleObj = new Triangle(side1:3,side2:4,side3:6);
	$squareObj = new Square(side:10);
				
	$geoShapesObjArr = [];
		
	$geoShapesObjArr[] = [$diskObj,$rectObj,$triangleObj,$squareObj];

	$resArray = [];
	
	foreach($geoShapesObjArr as $shapeObj) {
		$resArray[] = $shapeObj.accept(visitor:$shapesPropsCalculator);
	}	
		
	$expArray = [];
		
	$expArray = [
		'Shape:Disk,Area=78.54 unit length squared,Perimeter=31.42 unit length',
		'Shape:Rectangle,Area=12 unit length squared,Perimeter=7 unit length',
		'Shape:Triangle,Area=5.33 unit length squared,Perimeter=13 unit length',
		'Shape:Square,Area=100 unit length squared,Perimeter=40 unit length',	
	];
	
	$this->assertSame($expArray,$resArray);
   }

}
