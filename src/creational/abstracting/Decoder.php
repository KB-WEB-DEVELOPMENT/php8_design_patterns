<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Abstracting;

class Decoder
{	
	// note : method overriden in the child class - should ideally use an abstract class
	public function getUnSerializedData(mixed $data):null
	{
		return null;
	}	
}