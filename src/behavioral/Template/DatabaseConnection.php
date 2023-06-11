<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Template;

abstract class DatabaseConnection {

	abstract protected function connect(): string;

	public function printConnectionResult(string $connectionType,bool $connectionStatus): string
	{	
		
		$status = ($connectionStatus == true) ? 'Connected' : 'Failed';
		
		return 'Connection Type: ' . $connectionType . ' Connection Status: ' . $status;
	}
}
