<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Flyweight;

class Team 
{	
	public function __construct(
		protected string $teamName
	){}

	public function printWelcomeMessage(string $playerName,string $playerPosition,string $playerTeam): string 
	{
		return 'Welcome to the ' . $playerPosition . '&nbsp;' . $playerName . 'at ' . $playerTeam;   
    }
		
 }