<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Bridge;

interface DBConfigurer
{
	public function get(array $config): bool;
}