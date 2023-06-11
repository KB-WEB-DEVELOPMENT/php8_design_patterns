<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Mediator\Tests;

use php8_design_patterns\Behavioral\Mediator\AllUpperColleague;

use php8_design_patterns\Behavioral\Mediator\OnlyFirstUpperColleague;

use php8_design_patterns\Behavioral\Mediator\FormatMediator;

use PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase
{
		
	public function testCanGetStandardText():void
	{	
		$mediator = new FormatMediator('this is a very long text where the first letter of each word will change its letter case.');

		$str = $mediator->getTxt();
		
		$exp = 'this is a very long text where the first letter of each word will change its letter case.';
		
		$this->assertSame($exp,$str);	
   
	}
	
	public function testCanGetAllUpperText():void
	{	
		$mediator = new FormatMediator('this is a very long text where the first letter of each word will change its letter case.');

		$allUpperColleagueObj = $mediator->getAllUpper();
		
		$allUpperColleagueObj->setAllFirstUpperCase();
		
		$str = $allUpperColleagueObj->getTxt();
		
		$exp = 'This Is A Very Long Text Where The First Letter Of Each Word Will Change Its Letter Case.';
				
		$this->assertSame($exp,$str);	
   
	}

	public function testCanGetFirstUpperText():void
	{	
		$mediator = new FormatMediator('this is a very long text where the first letter of each word will change its letter case.');

		$onlyFirstUpperColleagueObj = $mediator->getOnlyFirstUpper();
		
		$onlyFirstUpperColleagueObj->setOnlyFirstUpperCase();
		
		$str = $onlyFirstUpperColleagueObj->getTxt();
		
		$exp = 'This is a very long text where the first letter of each word will change its letter case.';
				
		$this->assertSame($exp,$str);	
   
	}
	
        public function testCanGetStateChange():void
	{	
		$mediator = new FormatMediator('this is a very long text where the first letter of each word will change its letter case.');

		$onlyFirstUpperColleagueObj = $mediator->getOnlyFirstUpper();
		
		$onlyFirstUpperColleagueObj->setAllFirstUpperCase();
		
		$str = $onlyFirstUpperColleagueObj->getTxt();
		
		$exp = 'This Is A Very Long Text Where The First Letter Of Each Word Will Change Its Letter Case.';
				
		$this->assertSame($exp,$str);	  
	}			
}
