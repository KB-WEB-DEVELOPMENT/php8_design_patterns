<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Composite;

class LabelInputElement implements Renderable
{
	public function __construct(
		private array $elementConfig
	){}

	public function render(): string
	{
		$labelElement = '<label for="';
		$labelElement .= $this->elementConfig["for"] .'"';
		$labelElement .= '&nsbp;form="' . $this->elementConfig["form"] . '">';
		$labelElement .= $this->elementConfig["content"];
		$labelElement .= '</label>';
		
		return $labelElement;
	}
}