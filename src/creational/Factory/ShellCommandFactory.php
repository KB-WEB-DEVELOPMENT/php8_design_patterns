<?php

declare(strict_types=1);

namespace php8_design_patterns\Creational\Factory;

interface ShellCommandFactory
{
	public function createShellCommandCreator(): ShellCommandCreator;
	
}	
