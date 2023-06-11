<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Abstracting;

class XMLDecoder extends Decoder
{
	// note : method overrides the parent class, should ideally use an abstract class
	public function getUnSerializedData(string $data):array
	{
		$xmlFilePath = $data;
  
		$xmlFileContent = file_get_contents($xmlFilePath);
  
		$xmlObj = simplexml_load_string($xmlFileContent);
  
		$jsonData = json_encode($xmlObj);
  
		$newArray = json_decode($jsonData, true);
  
		return $newArray;
	}

}