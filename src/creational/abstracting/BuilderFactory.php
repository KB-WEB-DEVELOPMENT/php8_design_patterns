<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Abstracting;

interface BuilderFactory
{
	public function createEncoder(): Encoder;
	
	public function createDecoder(): Decoder;	
}