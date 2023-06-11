 <?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Composite;

interface Renderable
{
	public function render(): string;
}
