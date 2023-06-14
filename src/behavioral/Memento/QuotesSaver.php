<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Memento;

class QuotesSaver
{
	protected QuotesTimerState $currentQuotesTimerState;

	public function __construct(string $quote)
	{		
		$this->currentQuotesTimerState = new QuotesTimerState(quote:$quote);
	}

	public function saveToMemento(): QuotesTimerMemento
	{		
		$this->currentQuotesTimerState->quotesArray['start_time'] = microtime(true);
		
		return new QuotesTimerMemento(clone $this->currentQuotesTimerState);
	}

	public function restoreFromMemento(QuotesTimerMemento $quotesTimerMemento):void
	{
		$this->currentQuotesTimerState = $quotesTimerMemento->getState();
	}

	public function getState(): QuotesTimerState
	{
		$this->currentQuotesTimerState->quotesArray['end_time'] = microtime(true);
		
		return $this->currentQuotesTimerState;
	}
}