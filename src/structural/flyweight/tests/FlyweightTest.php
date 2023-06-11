<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Flyweight\Tests;

use php8_design_patterns\Structural\Flyweight\Team;
use php8_design_patterns\Structural\Flyweight\Player;
use php8_design_patterns\Structural\Flyweight\TeamFactory;

use PHPUnit\Framework\TestCase;

class FlyweightTest extends TestCase
{	
	public function testCanAddNewPlayerToExistingTeam():void
	{
				$playersArray = [];
				
				$team = new Team(teamName:'Real Madrid');
				
				$teamFactory = new TeamFactory(playersArray:$playersArray);
				
				$playersArray[] = $teamFactory->addPlayer(playerName:'Joe Doe',playerPosition:'Forward',Team:$team);
								
				$expArray = ['Joe Doe','Forward','Real Madrid'];
												
		        $this->assertSame($expArray,$playersArray);						
	}			

	public function testCanPrintWelcomeMessage():void
	{
	
		$playersArray = [
			[
				'John Doe',
				'forward',
				new Team(teamName:'Real Madrid')
			],
			[
				'Mark Blah',
				'defender',
				new Team(teamName:'FC Barcelona')
			],
			[
				'Dennis Last',
				'midfielder',
				new Team(teamName:'Manchester City')
			],
		];

		$teamFactory = new TeamFactory(playersArray:$playersArray);
		
		$msg = $teamFactory->printWelcomeMessage();
		
		$exp_msg = 'Welcome to the midfielder Dennis Last at Manchester City';
	
        $this->assertSame($exp_msg,$msg);		
	}
	
}
