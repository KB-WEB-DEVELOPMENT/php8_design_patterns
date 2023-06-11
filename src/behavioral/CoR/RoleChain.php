<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\CoR;

class RoleChain extends AbstractChain
{
    private array $validRoles = [
        'STUDENT',
        'LECTURER',
        'ADMIN',
    ];
 
    public function check(User $user): bool
    {
        foreach ($this->validRoles as $validRole) {
            if ($user->getRole() === $validRole) {
                return parent::check($user);
            }
        }
 
        return false;
    }
}	