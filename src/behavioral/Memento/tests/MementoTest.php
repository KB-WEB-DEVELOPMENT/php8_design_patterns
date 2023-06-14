<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Memento\Tests;

use php8_design_patterns\Behavioral\Memento\QuotesTimerMemento;
use php8_design_patterns\Behavioral\Memento\QuotesTimerState;
use php8_design_patterns\Behavioral\Memento\QuotesSaver;

use PHPUnit\Framework\TestCase;

class MementoTest extends TestCase
{
	public function testCanSaveAndRestoreQuote():void
	{
		$qsObj = new QuotesSaver(quote:'Better be prepared than sorry.');

		$mementoObj = $qsObj->saveToMemento();
		
		$qsObj->restoreFromMemento(QuotesTimerMemento:$mementoObj);
		
		$qsObj = $qsObj->getState()
		
		$quote = (string)$qsObj->quotesArray['quote content'];
		
		$exp = 'Better be prepared than sorry.';
		
		 $this->assertSame($exp,$quote);
	}

	public function testSaveAndRestoreIsInstantaneous():void
	{

		$qsObj = new QuotesSaver(quote:'Better be prepared than sorry.');

		$start_time_func = microtime(true);
		
		$mementoObj = $qsObj->saveToMemento();
		
		$qsObj->restoreFromMemento(QuotesTimerMemento:$mementoObj);
		
		$qsObj = $qsObj->getState()
		
		$end_time_func = microtime(true);
		
		$start_time_memento = (float)$qsObj->quotesArray['start_time'];
		
		$end_time_memento = (float)$qsObj->quotesArray['end_time'];
		
		$delta1 = (float)($end_time_func - $start_time_func);
		
		$delta2 = (float)($end_time_memento - $start_time_memento);
		
		$this->assertEqualsWithDelta($delta2,$delta1,1.0);

	}
	
}