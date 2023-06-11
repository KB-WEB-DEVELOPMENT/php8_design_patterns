<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Strategy\Tests;

use php8_design_patterns\Behavioral\Strategy\Context;
use php8_design_patterns\Behavioral\Strategy\ListSortingMachine;
use php8_design_patterns\Behavioral\Strategy\MapSortingMachine;

use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
	public function listSortingDataProvider(): array
    {
        return [
				'unsorted' => 
						['Finland', 'Spain', 'Burundi', 'Canada', 'USA'],
				'sorted'  =>		
						['Burundi', 'Canada', 'Finland', 'Spain', 'USA']
				];
    }
	
	public function mapSortingDataProvider(): array
    {
        return [
				'unsorted' =>	
						[7 => 'Croatia', 2 => 'Austria', 13 => 'Belgium', 1 => 'USA'],
				'sorted by key' =>	
						[1 => 'USA', 2 => 'Austria',  7 => 'Croatia', 13 => 'Belgium']
			   ]
	}	
		
	/**
     * @dataProvider listSortingDataProvider
    */
    public function testCanSortByList(array $unsortedArray,array $expectedSortedArray):void
    {
        $list = new ListSortingMachine('asc');
		
		$contextObj = new Context($list);
		
		$sortedArr = $contextObj->performSorting(unsortedArray:$unsortedArray);
		
		$this->assertSame($expectedSortedArray,$sortedArr);
    }
	
	/**
     * @dataProvider mapSortingDataProvider
    */
    public function testCanSortByMap(array $unsortedArray,array $expectedSortedArray):void
    {
      $map = new MapSortingMachine('key','asc');
	  
	  $contextObj = new Context($map);

	  $sortedArr = $contextObj->performSorting(unsortedArray:$unsortedArray);
	  
	  $this->assertSame($expectedSortedArray,$sortedArr);
    }
	
    public function testIsListSortingMachineConfigWrong():void
    {
		$unsorted = ['Finland','Spain','Burundi','Canada','USA'];
		
		$list = new ListSortingMachine('left');

		$contextObj = new Context($list);
		
		$res = $contextObj->performSorting(unsortedArray:$unsorted);
		
		$this->assertSame(false,$res);
		
    }	
	
    public function testIsMapSortingMachineConfigWrong():void
    {
		$unsorted = [7 => 'Croatia', 2 => 'Austria', 13 => 'Belgium', 1 => 'USA'];
		
		$map = new MapSortingMachine('key','right');

		$contextObj = new Context($map);
		
		$res = $contextObj->performSorting(unsortedArray:$unsorted);
		
		$this->assertSame(false,$res);
    }
	
}
