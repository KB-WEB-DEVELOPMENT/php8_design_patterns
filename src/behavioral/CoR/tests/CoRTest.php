<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR\Tests;

use php8_design_patterns\Behavioral\CoR\Authenticate;
use php8_design_patterns\Behavioral\CoR\CredentialChain;
use php8_design_patterns\Behavioral\CoR\RoleChain;
use php8_design_patterns\Behavioral\CoR\StatusChain;
use php8_design_patterns\Behavioral\CoR\User;

use PHPUnit\Framework\TestCase;

class CoRTest extends TestCase
{
	
	public function testCorrectCredentials():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate($chain);
		
		$user = new User('user1','1234','STUDENT',true);
		
		$res = $auth->login($user);
		
		$this->assertTrue($res);
		
    }

	public function testWrongUsername():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate($chain);
		
		$user = new User('user567','1234','STUDENT',true);
		
		$res = $auth->login($user);
		
		$this->assertFalse($res);
    }

	public function testWrongPassword():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate($chain);
		
		$user = new User('user1','9999','STUDENT',true);
		
		$res = $auth->login($user);
		
		$this->assertFalse($res);
    }

	public function testWrongRole():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate($chain);
		
		$user = new User('user1','1234','TOURIST',true);
		
		$res = $auth->login($user);
		
		$this->assertFalse($res);
    }

	public function testWrongStatus():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate($chain);
		
		$user = new User('user1','1234','STUDENT',false);
		
		$res = $auth->login($user);
		
		$this->assertFalse($res);
    }	
}	
