<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Flyweight;

class Player 
{
	public function __construct(
		protected string $playerName,
		protected string $playerPosition,
	    protected Team $team
	){}

	public function printWelcomeMessage(string $playerName,string $playerPosition,Team $team):string 
	{
	  $playerTeam = $team->name;
			
	   $team->printWelcomeMessage(playerName:$playerName,playerPosition:$playerPosition,playerTeam:(string)playerTeam);
        }		
 }
