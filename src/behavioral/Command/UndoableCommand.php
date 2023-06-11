<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Command;

interface UndoableCommand extends Command
{
	public function undo();
}