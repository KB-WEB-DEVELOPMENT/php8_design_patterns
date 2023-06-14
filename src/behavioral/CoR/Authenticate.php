<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR;

class Authenticate
{ 
    public function __construct(
		private AbstractChain $chain
	){}
 
    public function login(User $user): bool
    {
        return $this->chain->check(user:$user);
    }
}