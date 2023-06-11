<?php
declare(strict_types=1);
require_once 'XML/Serializer.php';

namespace php8_design_patterns\Creational\Abstracting\Tests;

use  php8_design_patterns\Creational\Abstracting\Builder;
use  php8_design_patterns\Creational\Abstracting\Encoder;
use  php8_design_patterns\Creational\Abstracting\Decoder;
use  php8_design_patterns\Creational\Abstracting\JsonEncoder;
use  php8_design_patterns\Creational\Abstracting\XMLEncoder;
use  php8_design_patterns\Creational\Abstracting\JsonDecoder;
use  php8_design_patterns\Creational\Abstracting\XMLDecoder;

use PHPUnit\Framework\TestCase;

class AbstractingTest extends TestCase
{

	public function testGetEncoderWithBuilder(Builder $builder):void
	{
		$encoder = $builder->createEncoder();
		
		$this->assertInstanceOf(Encoder::class,$encoder);
	}
	
	public function testGetDecoderWithBuilder(Builder $builder):void
	{

		$decoder = $builder->createDecoder();
		
		$this->assertInstanceOf(Decoder::class,$decoder);
		
	}
	
	public function testGetJsonEncoded(Builder $builder):void
	{
		$data =  [
			"Peter" => 35,
			"Ben" => 37,
			"Joe" => 43,
		];
		
		$encoder = $builder->createEncoder();
		
		$serialized = $encoder->getSerializedData(data:$data);
		
		$ser_exp = serialize($data);
		
		$this->assertSame($serialized,$ser_exp);
				
	}
	
	public function testGetXMLEncoded(Builder $builder):void
	{
		
		$data = ["book" =>
				  [
				    "title" => "Oliver Twist",
				    "author" => "Charles Dickens",
				  ]
			];
		
		$encoder = $builder->createEncoder();
		
		$serialized = $encoder->getSerializedData(data:$data);
		
		$serializer = new XML_Serializer();
		
		$result = $serializer->serialize($data);		
		
		$ser_exp = $serializer->getSerializedData();
		
		$this->assertSame($serialized,$ser_exp);
		
	}
		
	public function testGetJsonDecoded(Builder $builder):void
	{
		$data = "a:3:{i:0;s:3:"Red";i:1;s:5:"Green";i:2;s:4:"Blue";}";
		
		$decoder = $builder->createDecoder();
		
		$unserialized = $decoder->getUnSerializedData(data:$data);
		
		$uns_exp = (array)unserialize($data);
		
		$this->assertSame($unserialized,$uns_exp);
		
	}
	
	public function testGetXMLDecoded(Builder $builder):void
	{

		$xml = '<?xml version="1.0"?><array><book><title>Oliver Twist</title><author>Charles Dickens</author></book></array>';
				
		$decoder = $builder->createDecoder();
		$arr = $decoder->getUnSerializedData(data:$xml);
		
		$data = ["book" =>
				    [
				     "title" => "Oliver Twist",
				      "author" => "Charles Dickens",
				    ]
			];
				
		$this->assertSame($arr,$data);		
	}				
}
