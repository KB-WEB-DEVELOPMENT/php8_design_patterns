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
		$this->menuDay->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Drink Name',sustenanceObj:new Drink());
	}
	
	public function addStarter(): void
	{
		$this->menuDay->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Starter Name',sustenanceObj:new Starter());
	}
	
	public function addMainCourse(): void
	{
		$this->menuDay->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Main Course Name',sustenanceObj:new MainCourse());
	}
	
	public function addDessert(): void
	{
		$this->menuDay->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu of the Day Standard Dessert Name',sustenanceObj:new Dessert());
	}
	
	public function getSustenance(): Sustenance
    {
		return $this->menuDay;
	}
 }

