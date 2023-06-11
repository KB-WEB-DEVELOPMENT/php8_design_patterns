 <?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Bridge;

abstract class DBService
{
	public function __construct(	
		protected DBConfigurer $dbConfigurer
	){}
	
	abstract public function connect(array $config): bool;
			
}