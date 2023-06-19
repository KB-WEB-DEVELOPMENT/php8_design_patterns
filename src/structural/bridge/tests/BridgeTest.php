<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Bridge\Tests;

use php8_design_patterns\Structural\Bridge\PDOService;
use php8_design_patterns\Structural\Bridge\MySQLiService;
use php8_design_patterns\Structural\Bridge\PDOConfigurer;
use php8_design_patterns\Structural\Bridge\MySQLiConfigurer;

use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
	
	public function testCanConnectWithPDOService:void
	{
		
		$config = [
		   "ATT_EMULATE_PREPARES" => true,
		   "ATTR_ERRMODE" => true,
		   "ATTR_DEFAULT_FETCH_MODE" => true,
		   "SERVER" => "test_server",
		   "DB" => "test_db",
		   "CHARSET" => "UTF-8",
		   "USERNAME" => "test_user",
		   "PASSWORD" => "psswd",		   
		];
		
		$service = new PDOService(DBConfigurer:new PDOConfigurer());
	
		// assuming the connection works and the credentials are correct
		$this->assertSame(true,$service->connect(config:$config));
		
	}
	
	public function testCanConnectWithMySQLiService:void
	{
		
		$config = [
		  "SERVER" => "test_server",
		   "USERNAME" => "test_user",
		   "PASSWORD" => "psswd",			
		];
		
		$service = new MySQLiService(DBConfigurer:new MySQLiConfigurer());
		
		// assuming the connection works and the credentials are correct
		$this->assertSame(true,$service->connect(config:$config));
	}

}
