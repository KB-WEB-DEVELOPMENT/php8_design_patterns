<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR;

abstract class AbstractChain
{
    private object $next;
 
    public function linkNext(self $next): self
    {
        $this->next = $next;
 
        return $next;
    }
 
    public function check(User $user): bool
    {
        return $this->next ? $this->next->check(user:$user) : true;
    }
}