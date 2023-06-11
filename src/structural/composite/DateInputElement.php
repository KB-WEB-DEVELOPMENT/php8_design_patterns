<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Composite;

class DateInputElement implements Renderable
{
	public function __construct(
		private array $elementConfig
	){}

	public function render(): string
	{
		$dateElement = '<input type="date" id="';
		$dateElement .= $this->elementConfig["id"] . '"';
		$dateElement .= '&nsbp;name="' . $this->elementConfig["name"] . '">';
		
		return $dateElement;
	}
}