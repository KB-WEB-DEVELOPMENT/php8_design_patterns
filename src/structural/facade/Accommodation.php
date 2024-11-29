<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Facade;

interface Accommodation
{
	public function showValidIdentity(string $passwordID): bool;
	
	public function registerAccommodation(string $passwordID,string $address): bool;
	
	public function payDeposit(string $passwordID,int $amount): bool;

}
