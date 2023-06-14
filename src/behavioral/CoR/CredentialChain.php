<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR;

class CredentialChain extends AbstractChain
{
	
	private array $chainedUsers = [
        	['username' => 'user1', 'password' => '1234', 'role' => 'STUDENT', 'is_active' => true],
		['username' => 'user2', 'password' => '5678', 'role' => 'STUDENT', 'is_active' => true],
        	['username' => 'user3', 'password' => '6789', 'role' => 'LECTURER', 'is_active' => true],
        	['username' => 'user5', 'password' => '1445', 'role' => 'ADMIN', 'is_active' => true]
    	];
 
    public function check(User $user): bool
    {
        foreach ($this->chainedUsers as $u) {
            if (($user->getUsername() === $u['username']) && ($user->getPassword() === $u['password'])) {
                return parent::check(user:$user);
            }
        }
        return false;
    }
}
