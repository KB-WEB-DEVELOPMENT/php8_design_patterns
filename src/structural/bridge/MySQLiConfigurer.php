<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Bridge;

class MySQLiConfigurer implements DBConfigurer
{
	public function get(array $config): bool
	{
		$conn = mysqli_connect($config["SERVER"],$config["USERNAME"],$config["PASSWORD"]);
	
	    return (!$conn) ? false : true;
	}	
}