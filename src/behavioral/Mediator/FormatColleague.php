<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Mediator;

abstract class FormatColleague 
{	    
	public function __construct(
		private FormatMediator $mediator
	) {}
        
	private function getMediator(): FormatMediator
	{
		
		return $this->mediator;
	}
    	
	private function change(FormatColleague $formatColleagueObj): void
	{		
		$this->getMediator()->change($formatColleagueObj);
	}
}
