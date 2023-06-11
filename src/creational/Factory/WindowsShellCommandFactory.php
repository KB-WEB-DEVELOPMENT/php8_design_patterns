<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Factory;

class WindowsShellCommandFactory implements ShellCommandFactory
{
	public function createShellCommandCreator(): ShellCommandCreator
	{
	  return new WindowsShellCommandCreator;	
	}		
}