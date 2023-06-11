<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Strategy;

interface SortingMachine
{
	public function performSorting(array $unsortedArray): array|bool;
}