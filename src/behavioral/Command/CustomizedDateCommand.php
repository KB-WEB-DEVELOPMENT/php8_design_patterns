<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Command;

class CustomizedDateCommand implements UndoableCommand
{
	public function __construct(private Receiver $output)
	{
	}

	public function execute():void
	{
		$this->output->enableDateConfig();
	}

	public function undo():void
	{
		$this->output->disableDateConfig();
	}
}