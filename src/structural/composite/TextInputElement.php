<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Composite;

class TextInputElement implements Renderable
{
	public function __construct(
		private array $elementConfig
	 ){}
	
	public function render(): string
	{
		$textElement = '<input type="text" id="';
		$textElement .= $this->elementConfig["id"] . '"';
		$textElement .= '&nsbp;name="' . $this->elementConfig["name"] . '"';
		$textElement .= '&nsbp;value="' . $this->elementConfig["value"] . '">';
		
		return $textElement;
	}
}