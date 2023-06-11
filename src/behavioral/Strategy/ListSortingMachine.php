<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Strategy;

class ListSortingMachine implements SortingMachine
{
	public function __construct(
		private string $sortDir
	){}
	
	public function performSorting(array $unsortedArray): array|bool
	{
		
		if (!in_array(strtoupper($this->sortDir),['ASC','DESC'])) {
			return false;
		}
		
		$sortedArray = [];
		
		$sortedArray = match(strtoupper($this->sortDir)) {
			'ASC' => sort($unsortedArray),
			'DESC' => rsort($unsortedArray),
		};
		
		return $sortedArray;		
	}	


}