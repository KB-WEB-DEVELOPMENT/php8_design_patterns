<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Prototype;

abstract class HtmlElementPrototype
{
	public function __construct( 
        public string $elementId,
        public string $elementName,
		public array  $elementConfig,
    ) {}

	abstract public function __clone();

	abstract public function getElementId(): string
	{
	}

	abstract public function getElementName(): string
	{
	}

	abstract public function getElementHtmlCode(): string
	{
	}
}