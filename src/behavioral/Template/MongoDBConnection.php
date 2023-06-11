<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Template;

class  MongoDBConnection extends DatabaseConnection {
		
	public function __construct(
		private string $uri,
		private array  $uriOptions = []
	){}
	
     protected function connect(): string
	 {
			$connectionType = 'MongoDBConnection';
		
			if (!empty($this->uriOptions)) {
				
				$configArr = [];
				
				$configArr['username'] = $this->uriOptions['username'] ?? "";
				$configArr['password'] = $this->uriOptions['password'] ?? "";
				$configArr['ssl'] = $this->uriOptions['ssl'] ?? true;
				$configArr['replicaSet'] = $this->uriOptions['replicaSet'] ?? "";
				$configArr['authSource'] = $this->uriOptions['authSource'] ?? "";
					
				$mongoDBclient = new MongoDB\Client(
					$uri,	
					[			    
						'username' => $configArr['username'],
						'password' => $configArr['password'],
						'ssl' => $configArr['ssl'] ,
						'replicaSet' => $configArr['replicaSet'],
						'authSource' => $configArr['authSource'],				
					],
				);
			
			} else {
				
				$mongoDBclient = new MongoDB\Client($this->uri);			  
			}	
							
			try {
				
				$dbListOrException = $mongoDBclient->listDatabases();

				$connectionStatus = true;
				
			} catch (Exception) {
			
				$connectionStatus = false;
			}
					 
		$this->printConnectionResult(connectionType:$connectionType,connectionStatus:$connectionStatus);	
	 }	 
}