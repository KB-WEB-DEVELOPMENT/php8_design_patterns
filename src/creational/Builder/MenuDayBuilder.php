<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Builder;

use php8_design_patterns\Creational\Builder\Components\Sustenance;
use php8_design_patterns\Creational\Builder\Components\MenuDay;
use php8_design_patterns\Creational\Builder\Components\Dessert;
use php8_design_patterns\Creational\Builder\Components\Drink;
use php8_design_patterns\Creational\Builder\Components\MainCourse;
use php8_design_patterns\Creational\Builder\Components\Starter;

class MenuDayBuilder implements Builder
{
	private MenuDay $menuDay;
	
	public function createSustenance(): void
	{
		 $this->menuDay = new MenuDay();
	}
	
	public function addDrink(): void
	{
		$this->menuDay->setComponent('From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Drink Name', new Drink());
	}
	
	public function addStarter(): void
	{
		$this->menuDay->setComponent('From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Starter Name', new Starter());
	}
	
	public function addMainCourse(): void
	{
		$this->menuDay->setComponent('From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Main Course Name', new MainCourse());
	}
	
	public function addDessert(): void
	{
		$this->menuDay->setComponent('From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Dessert Name', new Dessert());
	}
	
	public function getSustenance(): Sustenance
        {
		return $this->menuDay;
	}
 }
