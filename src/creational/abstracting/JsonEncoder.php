<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Abstracting;

class JsonEncoder extends Encoder
{	
	// note : method overrides the parent class, should ideally use an abstract class
	public function getSerializedData(mixed $data):string
	{	
		$arr = (array)$data;	
		
		$serialized = serialize($arr);
		
		return $serialized; 		
	}
}
