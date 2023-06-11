<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Abstracting;

class Builder implements BuilderFactory
{
	public function createEncoder(): Encoder
	{
		return new Encoder();
	}

	public function createDecoder(): Decoder
	{
		return new Decoder();
	}
}
