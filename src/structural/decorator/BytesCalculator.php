<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Decorator;

interface BytesCalculator
{
	public function getBytesSize(string $str): int
}

