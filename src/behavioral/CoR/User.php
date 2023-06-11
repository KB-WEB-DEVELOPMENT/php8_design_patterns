<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR;

class User
{
    public function __construct(
		private string $username,
		private string $password,
		private string $role,
		private bool $isActive
	) {}
 
    public function getUsername(): string
    {
        return $this->username;
    }
 
    public function getPassword(): string
    {
        return $this->password;
    }
 
    public function getRole(): string
    {
        return $this->role;
    }
 
    public function isActive(): bool
    {
        return $this->isActive;
    }
}