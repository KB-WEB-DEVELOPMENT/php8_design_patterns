<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Bridge;

class PDOService extends DBService
{
	public function connect(array $config): bool
	{		
		return $this->dbConfigurer->get($config);	
	}			
}