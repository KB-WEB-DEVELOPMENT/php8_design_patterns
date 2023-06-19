<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Template;

class  PostgresSQLConnection extends DatabaseConnection {
	
	public function __construct(
		private string $host,
		private int $port,
		private string $dbname,
		private string $user,
		private string $password,
		private int $flags = 0 // Only 0 or 1 allowed
	){}
	
     protected function connect(): string
     {
		$connectionType = 'PostgresSQLConnection';
		
		$conn_str = 'host=' . $this->host . ' port=' . $this->port . ' dbname=' . $this->dbname . ' user=' . $this->user;
		$conn_str .= ' password=' . $this->password;

		$connectionStatus = (pg_connect($conn_str,$this->flags) == false) ? false : true;			 
			 
		$this->printConnectionResult(connectionType:$connectionType,connectionStatus:$connectionStatus);	
     }	 
}
