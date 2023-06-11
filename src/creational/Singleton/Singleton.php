<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Singleton;

use Exception;

final class Singleton
{
	private static ?Singleton $instance = null;
	private static array $dbConfig = ["servername" => "localhost", "username" => "user"];

	private function __construct()
	{		
	}
	
	public static function getInstance(): Singleton
	{
		if(self::$instance === null) {
			self::$instance = new self();
		}				
		return self::$instance;		
	}
		
	public static function getDBConfig(): array
	{	
		return self::$dbConfig;
	}

	public function __wakeup()
	{		
		throw new Exception("Cannot unserialize singleton.");
	}   	
}
