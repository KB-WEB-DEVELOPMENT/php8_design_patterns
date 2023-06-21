<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Decorator\Tests;

use php8_design_patterns\Structural\Decorator\StringBytesCalculator;
use php8_design_patterns\Structural\Decorator\StringCompressor;
use php8_design_patterns\Structural\Decorator\StringEncryptor;

use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
	public function testCanGetSizeNormalString():void
	{
		$sc = new StringBytesCalculator();
		
		$this->assertSame(5,$sc->getBytesSize(str:"Kâmi"));
	}
	
	public function testCanGetSizeCompressedString():void
	{
		$sc = new StringBytesCalculator();
		$sc = new StringCompressor(bytesCalculator:$sc);
		
		// note: that we are better off not compressing such short strings
		$this->assertSame(13,$sc->getBytesSize(str:"Kâmi"));
		
	}
	
	public function testCanGetSizeEncryptedString():void
	{
		$sc = new StringBytesCalculator();
		$sc = new StringEncryptor(bytesCalculator:$sc);
		
		$this->assertSame(8,$sc->getBytesSize(str:"Kâmi"));
	}
 
	public function testCanGetSizeEncryptedCompressedString():void
	{
		
		$sc = new StringBytesCalculator();
		$sc = new StringEncryptor(bytesCalculator:$sc);
	
                /* note: gzcompress("Kâmi") used as workaround here since we did not create any specific methods to 
		get compressed strings and get encrypted strings */ 	
		$this->assertSame(20,$sc->getBytesSize(str:gzcompress("Kâmi")));
	}		
}
