<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Facade;

interface Bank
{
	public function openBankAccount(string $passwordID,string $address,array $contactInfos): bool;
}
