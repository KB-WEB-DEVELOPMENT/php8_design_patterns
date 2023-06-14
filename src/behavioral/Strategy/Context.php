<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Strategy;

class Context
{
	public function __construct(
		protected SortingMachine $sortingMachine
	){}

	public function doSorting(array $unsortedArray): array|bool
	{

		$sortedArrayOrFalse = $sortingMachine->performSorting(unsortedArray:$unsortedArray);
		
		return $sortedArrayOrFalse;
	
	}
}