<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Command\Tests;
use php8_design_patterns\Behavioral\Command\DateCommand;
use php8_design_patterns\Behavioral\Command\CustomizedDateCommand;
use php8_design_patterns\Behavioral\Command\Receiver;
use php8_design_patterns\Behavioral\Command\Invoker;

use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
	public function testStandardDateInvocation():void
	{
		$invoker = new Invoker();
		$receiver = new Receiver(firstname:'Kâmi',dateConfig:array());

		$dc = new DateCommand(Receiver:$receiver);

    		$invoker->setCommand(Command:$dc);
		$invoker->run();
		
		$dt = new DateTime();
		
		$exp_str = 'Hi Kâmi, it is ' . $dt->format('d-m-Y H:i:s') . '.';
		
		$this->assertSame($exp_str,$receiver->printMessage());
	
	}
	
	public function testCustomizedDateInvocation():void
	{
		$invoker = new Invoker();
		
		$dateConfig = [
			"dateType" => "FULL",
			"timeType" => "FULL",
			"calendar" => "TRADITIONAL"
		]	
		
		$receiver = new Receiver(firstname:'Kâmi',dateConfig:$dateConfig);
		
		$cdc = new CustomizedDateCommand(Receiver:$receiver);

        $invoker->setCommand(Command:$cdc);
		$invoker->run();

		$exp_str = 'Hi Kâmi, it is ' . date('l, d F Y') . ' at ' . date('h:i:s a') . date_default_timezone_get() . '.';
		
		$this->assertSame($exp_str, $receiver->printMessage());

	}
		
	public function testModifiedDateInvocation():void
	{
		$invoker = new Invoker();
		
		$dateConfig = [
			"dateType" => "FULL",
			"timeType" => "FULL",
			"calendar" => "TRADITIONAL"
		]	
		
		$receiver = new Receiver(firstname:'Kâmi',dateConfig:$dateConfig);
		
		$cd = new CustomizedDateCommand(Receiver:$receiver);
		
		$invoker->setCommand(Command:$cd);
		$invoker->run();
		
		$cd->undo();
		
		$invoker->setCommand(Command:$cd);
		$invoker->run();
		
		$dt = new DateTime();
		
		$exp_str = 'Hi Kâmi, it is ' . $dt->format('d-m-Y H:i:s') . '.';
		
		$this->assertSame($exp_str,$receiver->printMessage());				
	}		
}
