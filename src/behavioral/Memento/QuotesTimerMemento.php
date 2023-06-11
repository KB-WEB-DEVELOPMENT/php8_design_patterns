<?php

class QuotesTimerMemento
{
	public function __construct(
	
		private QuotesTimerState $quotesTimerState
	
	){}

	public function getState(): QuotesTimerState
	{
		return $this->quotesTimerState;
	}
}
