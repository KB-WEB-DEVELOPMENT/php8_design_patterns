<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Command;

class DateCommand implements Command
{
	public function __construct(
		private Receiver $output
	){}
	
	public function execute():string
	{
		$this->output->printMessage();
	}
}