<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR;

class StatusChain extends AbstractChain
{
    public function check(User $user): bool
    {        
		return $user->isActive() ? parent::check($user) : false;		
    }
}
