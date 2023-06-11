<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Builder\Components;

abstract class Sustenance
{
	// in real life, this method should not be final and should be implemented in the Menu class and the MenuDay class
	final public function setComponent(string $sustenanceName, object $sustenanceObj)
	{
		
	}	
	
}