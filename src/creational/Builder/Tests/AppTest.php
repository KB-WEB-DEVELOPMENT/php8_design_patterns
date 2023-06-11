<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Builder\Tests;

use php8_design_patterns\Creational\Builder\App;
use php8_design_patterns\Creational\Builder\MenuBuilder;
use php8_design_patterns\Creational\Builder\MenuDayBuilder;
use php8_design_patterns\Creational\Builder\Components\Dessert;
use php8_design_patterns\Creational\Builder\Components\Drink;
use php8_design_patterns\Creational\Builder\Components\MainCourse;
use php8_design_patterns\Creational\Builder\Components\Menu;
use php8_design_patterns\Creational\Builder\Components\MenuDay;
use php8_design_patterns\Creational\Builder\Components\Starter;

use PHPUnit\Framework\TestCase;

// note : Builder Design pattern : we are only testing the ability to instantiate classes through 
// the MenuBuilder and MenuDayBuilder classes, not checking the  properties of $newMenu and $newMenuDay 
class AppTest extends TestCase
{	
	public function testCanBuildMenu():void
	{
		$menuBuilder = new MenuBuilder();
		$newMenu = (new App())->build(Builder:$menuBuilder);

		$this->assertInstanceOf(Menu::class,$newMenu);
	}

	public function testCanBuildMenuOfTheDay():void
	{
		$menuDayBuilder = new MenuDayBuilder();
		$newMenuDay = (new App())->build(Builder:$menuDayBuilder);

		$this->assertInstanceOf(MenuDay::class,$newMenuDay);
	}
}
