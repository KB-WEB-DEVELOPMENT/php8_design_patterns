<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Builder;

use php8_design_patterns\Creational\Builder\Components\Sustenance;
use php8_design_patterns\Creational\Builder\Components\Menu;
use php8_design_patterns\Creational\Builder\Components\Dessert;
use php8_design_patterns\Creational\Builder\Components\Drink;
use php8_design_patterns\Creational\Builder\Components\MainCourse;
use php8_design_patterns\Creational\Builder\Components\Starter;

class MenuBuilder implements Builder
{
	private Menu $menu;
	
	public function createSustenance(): void
	{
		 $this->menu = new Menu();
	}
	
	public function addDrink(): void
	{
		$this->menu->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu Standard Drink Name',sustenanceObj:new Drink());
	}
	
	public function addStarter(): void
	{
		$this->menu->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu Standard Starter Name',sustenanceObj:new Starter());
	}
	
	public function addMainCourse(): void
	{
		$this->menu->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu Standard Main Course Name',sustenanceObj:new MainCourse());
	}
	
	public function addDessert(): void
	{
		$this->menu->setComponent(sustenanceName:'From dd/mm/yyyy to dd/mm/yyyy | Menu Standard Dessert Name',sustenanceObj:new Dessert());
	}
	
	public function getSustenance(): Sustenance
    {
		return $this->menu;
	}
 }
