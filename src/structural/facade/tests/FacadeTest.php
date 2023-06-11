<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Facade\Tests;

use php8_design_patterns\Structural\Facade\JobFacade;

use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
	public function testCanSubmitInvoice():void
	{
		
		$mock = $this->createMock(JobFacade::class);
		
		$mock->expects($this->once())
                     ->setConstructorArgs([Bank::class,Accommodation::class])
		     ->method('submitInvoice')
                      ->with('employeedID','IDAX962')
		      ->with('hoursWorked',48)
		      ->willReturn('valid invoice');
		
	        $this->assertEquals('valid invoice', $mock->submitInvoice('IDAX962',48));
	}

        #[Depends('testCanSubmitInvoice')] 
	public function testCanGetPaid():void
	{
	   $mock = $this->createMock(JobFacade::class);
		
	   $mock->expects($this->once())
	        ->setConstructorArgs([Bank::class,Accommodation::class])
                ->method('getPaid')
                ->with('employeedID','IDAX962')
		->with('hoursWorked',48)
		->willReturn(true);
		
	    $this->assertTrue(true,$mock->getPaid('IDAX962',48));
	}
	
	public function testIsPrePaidRequirementMet():void
	{
		$mock = $this->createMock(JobFacade::class);
		
		$mock->expects($this->once())
                     ->setConstructorArgs([Bank::class,Accommodation::class])
		     ->method('isPrePaidRequirementMet')
                     ->with('passwordID','JOLKI927')
		     ->with('address','25 Jackson Street')
                      ->with('contactInfos',['landlineNum' => 123456, 'cellNum' => 35788, 'email' => 'test@gmail.com'])
		      ->with('amount',1200)			 			 
		      ->willReturn(true);
		
		$this->assertTrue(true,$mock->isPrePaidRequirementMet('JOLKI927','25 Jackson Street',['landlineNum' => 123456, 'cellNum' => 35788, 'email' => 'test@gmail.com'],1200));	
	}	
}
