<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Facade;

class JobFacade
{
	public function __construct(
		private Bank $bank,
		private Accommodation $accommodation
	){}

	public function submitInvoice(string $employeeID,int $hoursWorked): string
	{
		return  ( strlen($employeedID) == 5 && $hoursWorked > 0 ) ? "valid invoice" : "invalid invoice"; 
	}

	public function getPaid(string $employeeID,int $hoursWorked): bool
	{
		return  ($this->submitInvoice(employeeID:$employeeID,hoursWorked:$hoursWorked) == "valid invoice") ? true : false;  
	}
	
	public function isPrePaidRequirementMet(string $passwordID,string $address,array $contactInfos,int $amount): bool
        {
	     	if (!$this->accommodation->showValidIdentity(passwordID:$passwordID))
		  return false;
	
		if (!$this->accommodation->registerAccommodation(passwordID:$passwordID,adress:$address))
		  return false;
	
		if (!$this->accommodation->payDeposit(passwordID:$passwordID,amount:$amount))
		  return false;
		
		return $this->bank->openBankAccount(passwordID:$passwordID,address:$address,contactInfos:$contactInfos);
        }		
}
