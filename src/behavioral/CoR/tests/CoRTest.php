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

		$auth = new Authenticate(chain:$chain);
		
		$user = new User(username:'user1',password:'1234',role:'STUDENT',isActive:true);
		
		$res = $auth->login(user:$user);
		
		$this->assertTrue($res);
		
    }

	public function testWrongUsername():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate(chain:$chain);
		
		$user = new User(username:'user567',password:'1234',role:'STUDENT',isActive:true);
		
		$res = $auth->login($user);
		
		$this->assertFalse($res);
    }

	public function testWrongPassword():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate(chain:$chain);
		
		$user = new User(username:'user1',password:'9999',role:'STUDENT',isActive:true);
		
		$res = $auth->login(user:$user);
		
		$this->assertFalse($res);
    }

	public function testWrongRole():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate(chain:$chain);
		
		$user = new User(username:'user1',password:'1234',role:'TOURIST',isActive:true);
		
		$res = $auth->login(user:$user);
		
		$this->assertFalse($res);
    }

	public function testWrongStatus():void
	{	
		$chain = new CredentialChain();
		
		$sc = new StatusChain();
		
		$rc = new RoleChain();
		
		$chain->linkNext($sc)->linkNext($rc);

		$auth = new Authenticate(chain:$chain);
		
		$user = new User(username:'user1',password:'1234',role:'STUDENT',isActive:false);
		
		$res = $auth->login(user:$user);
		
		$this->assertFalse($res);
    }	
}	