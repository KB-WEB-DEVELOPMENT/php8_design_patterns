<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Composite;

class Form implements Renderable
{
	 public function __construct(
		private array $elements		
	 ){}
	
	public function render(): string
	{
		$formCode = '<form>';

		foreach ($this->elements as $element) {
			$formCode .= $element->render();
		}

		$formCode .= '<input type="submit" value="submit">';
		$formCode .= '</form>';
		
		return $formCode;
	
	}

	public function addElement(Renderable $element):void
	{
		$this->elements[] = $element;
	}
}