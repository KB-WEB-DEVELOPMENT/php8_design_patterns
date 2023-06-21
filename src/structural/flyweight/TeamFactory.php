<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Flyweight;

class TeamFactory 
{
	public function __construct(
	  private array $playersArray
	){}

    public function addPlayer(string $playerName,string $playerPosition,Team $team): array
    {   
	$newPlayer = new Player(playerName:$playerName,playerPosition:$playerPosition,Team:$team);
		
        $this->playersArray[] = $newPlayer;
		
	return $this->playersArray;
    }

    public function printWelcomeMessage():string
    {	
       $newestPlayer = end($this->playersArray);
				
       $playerName = (string)$newestPlayer->playerName;
       $playerPosition = (string)$newestPlayer->playerPosition;
       $team = (string)$newestPlayer->team;
        
       $newestPlayer->printWelcomeMessage(playerName:$playerName,playerPosition:$playerPosition,playerTeam:$team);				
     }
 }
