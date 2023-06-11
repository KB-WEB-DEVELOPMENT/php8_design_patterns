<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Abstracting;

class JsonDecoder extends Decoder
{
	// note : method overrides the parent class, should ideally use an abstract class
	public function getUnSerializedData(string $data):array
	{
		$str = $data;
		
		$unserialized = (array)unserialize($str);
		
		return $unserialized;
	}
}