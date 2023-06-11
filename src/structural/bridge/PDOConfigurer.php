<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Bridge;

class PDOConfigurer implements DBConfigurer
{
	public function get(array $config): bool
	{
	       $options = [
			PDO::ATTR_EMULATE_PREPARES => $config["ATT_EMULATE_PREPARES"],
			PDO::ATTR_ERRMODE => $config["ATTR_ERRMODE"],
			PDO::ATTR_DEFAULT_FETCH_MODE => $config["ATTR_DEFAULT_FETCH_MODE"],
		];

		$dsn = 'mysql:host=' . $config["SERVER"] . ';dbname=' . $config["DB"] .  ';charset=' . $config["CHARSET"]; 
	
		try {	
			$pdo = new PDO($dsn,$config["USERNAME"],$config["PASSWORD"], $options);
	
			return true;
		
		}  else {
			  return false;
		   }	
	}	
}
