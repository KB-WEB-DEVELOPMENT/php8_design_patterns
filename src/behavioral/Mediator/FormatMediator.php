<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Mediator;

class FormatMediator {
	
	protected AllUpperColleague $allUpperColleagueObj;
	protected OnlyFirstUpperColleague $onlyFirstUpperColleagueObj;
	
	public function __construct(	
		private string $text
	) {}
    
	protected function getTxt(): string
	{		
		return $this->text;
	}
	
	protected function getAllUpper(): object
	{
		$this->allUpperColleagueObj = new AllUpperColleague($this->text);
		
		return $this->allUpperColleagueObj;
	}
    
	protected function getOnlyFirstUpper(): object
	{
		$this->onlyFirstUpperColleagueObj = new OnlyFirstUpperColleague($this->text);
	
		return $this->onlyFirstUpperColleagueObj;
	}
        
	protected function change(FormatColleague $formatColleagueObj): void 
	{
    
		if ($formatColleagueObj instanceof AllUpperColleague) {
		
			if (($formatColleagueObj->getState() == 'all_first_upper')  && ($this->getAllUpper()->getState() != 'all_first_upper')) {
			  
				$this->getAllUpper()->setAllFirstUpperCase();
			
			} elseif (($formatColleagueObj->getState() == 'only_first_upper')  && ($this->getAllUpper()->getState() != 'only_first_upper')) {
				
				$this->getAllUpper()->setOnlyFirstUpperCase();
			}          
		}

		if ($formatColleagueObj instanceof OnlyFirstUpperColleague) {
		
			if (($formatColleagueObj->getState() == 'only_first_upper')  && ($this->getOnlyFirstUpper()->getState() != 'only_first_upper')) {
			  
				$this->getOnlyFirstUpper()->setOnlyFirstUpperCase();
			
			} elseif (($formatColleagueObj->getState() == 'all_first_upper')  && ($this->getOnlyFirstUpper()->getState() != 'all_first_upper')) {
				
				$this->getOnlyFirstUpper()->setAllFirstUpperCase();
			}          
		}
	}	
}