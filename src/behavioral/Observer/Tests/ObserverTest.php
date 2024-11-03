<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Observer\Tests;

use php8_design_patterns\Behavioral\Observer\Subject;
use php8_design_patterns\Behavioral\Observer\Observer;

use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
	public function testCanAttachObserver():void
	{
		$subject = new Subject();
		
		$copy_subject = $subject;
		
		$observer = new Observer(id:1);
		
		$subject->attach(observer:$observer);
		
		$error = 'We expect this test to fail as the class member $observers of both $copy_subject and $subject does not have the same value.';
		
		$this->assertObjectEquals($copy_subject,$subject,$error);
	
	}

	public function testCanDetachObserver():void
	{
		$subject1 = new Subject();
		$subject2 = new Subject();

		$observer = new Observer(id:1);
		
		$subject1->attach(observer:$observer);
		$subject2->attach(observer:$observer);
		
		$subject1->detach(observer:$observer);
		
		$error = 'We expect this test to fail as the class member $observers of both $subject1 and $subject2 does not have the same value.';
		
		$this->assertObjectEquals($subject1,$subject2,$error);
	
	}
	
	public function testCanSetNewState():void
	{
		$subject = new Subject();
		
		$subject->setState(state:'new state');
		
		$res = $subject->getState();
		
		$exp = 'new state';
		
		$this->assertSame($exp,$res);
		
	}

	public function testCanNotifyObservers():void
	{
	
		$subject = new Subject();
		
		$observer = new Observer(id:1);
		
		$subject->attach(observer:$observer);
		
		$str = $subject->setState(state:'state trying to notify all observers');
		
		$exp = 'Observer 1 notified with new state: state trying to notify all observers.';
		
		$this->assertSame($exp,$str);
	
	}	

}
