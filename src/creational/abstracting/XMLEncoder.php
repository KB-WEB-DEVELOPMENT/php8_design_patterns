<?php
declare(strict_types=1);
require_once 'XML/Serializer.php';

namespace php8_design_patterns\Creational\Abstracting;

class XMLEncoder extends Encoder
{
	// note : method overrides the parent class, should ideally use an abstract class
	public function getSerializedData(mixed $data):string
	{	
		$serializer = new XML_Serializer();

		$xml = array($data);

		$serialized = $serializer->serialize($xml);

		return (is_string($serialized) == true) ? $serializer->getSerializedData() : "undefined";
	}
}