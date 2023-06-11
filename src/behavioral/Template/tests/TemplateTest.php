<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Template\Tests;

use php8_design_patterns\Behavioral\Template\PostgresSQLConnection;
use php8_design_patterns\Behavioral\Template\MongoDBConnection;

use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    public function testCanConnectPostgresSQL():void
    {
		$pgConnObj = new PostgresSQLConnection('localhost',3306,'testDB','admin','admin-password',0);
		
		$str = $pgConnObj->connect();
		
		$exp = 'Connection Type: PostgresSQLConnection Connection Status: Connected';
		
		// assuming a working PostgresSQL connection
		$this->assertSame($exp,$str);
    }
	
	public function testCanConnectMongoDB():void
    {
		$uriOptions = [];

		$uriOptions['username'] = 'admin';
		$uriOptions['password'] = 'admin-password';
		$uriOptions['ssl'] = true;
		$uriOptions['replicaSet'] = 'myReplicaSet';
		$uriOptions['authSource'] = 'admin';
				
		$mongoDBConnObj = new MongoDBConnection('mongodb://mongodb-deployment:27017',$uriOptions);
		
		$str = $mongoDBConnObj->connect();
		
		$exp = 'Connection Type: MongoDBConnection Connection Status: Connected';
		
		// assuming a working MongoDB connection
		$this->assertSame($exp,$str);		
    }	
}
