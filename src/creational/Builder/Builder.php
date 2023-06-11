<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Builder;

use php8_design_patterns\Creational\Builder\Components\Sustenance;

interface  Builder
{
	public function createSustenance(): void;
	public function addDrink(): void;
	public function addStarter(): void;
	public function addMainCourse(): void;
	public function addDessert(): void;
	public function getSustenance(): Sustenance;
}