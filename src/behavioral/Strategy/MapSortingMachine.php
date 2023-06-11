<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Strategy;

class MapSortingMachine implements SortingMachine
{
	public function __construct(
		private string $sortBy,
		private string $sortDir
	){}
	
	public function performSorting(array $unsortedArray): array|bool
	{
		
		if (!in_array(strtoupper($this->sortBy),['KEY','VALUE'])) {
			return false;
		}	
		
		if (!in_array(strtoupper($this->sortDir),['ASC','DESC'])) {
			return false;
		}
		
		$fullSorting = strtoupper($this->sortBy) . '-'  . strtoupper($this->sortDir);
		
		$sortedArray = [];
		
		$sortedArray = match($fullSorting) {
			
			'KEY-ASC' => ksort($unsortedArray),
			'KEY-DESC' => krsort($unsortedArray),
			'VALUE-ASC' => asort($unsortedArray),
			'VALUE-DESC' => arsort($unsortedArray),		
		};
		
		return $sortedArray;		
	}	
}