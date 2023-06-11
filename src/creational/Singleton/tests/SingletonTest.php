<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Singleton\Tests;

use php8_design_patterns\Creational\Singleton\Singleton;

use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
	public function testUniqueSingleton():void
	{
		$s1 = Singleton::getInstance();
		$s2 = Singleton::getInstance();

		$this->assertInstanceOf(Singleton::class,$s1);
		$this->assertSame($s1,$s2);
	}
	
	public function testCanGetDBConfig():void
	{
		$s1 = Singleton::getInstance();
		
		$dbConfig = $s1::getDBConfig();
		
		$exp_config = [
			"servername" => "localhost",
			"username" => "user",
		];
				
		$this->assertSame($exp_config,$dbConfig);
	}	

}
