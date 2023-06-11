<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Builder;

use php8_design_patterns\Creational\Builder\Components\Sustenance;

class App
{
	public function build(Builder $builder): Sustenance
	{
		$builder->createSustenance();
		
		$builder->addDrink();
		$builder->addStarter();
		$builder->addMainCourse();
		$builder->addDessert();
		
		return $builder->getSustenance();
	}
}
