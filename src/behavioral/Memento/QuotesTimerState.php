<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Memento;

class QuotesTimerState
{

	protected array $quotesArray = [];


	public function __construct(string $quote)
	{
		$this->quotesArray[
			'quote content' => $quote
		]; 
	}

}
