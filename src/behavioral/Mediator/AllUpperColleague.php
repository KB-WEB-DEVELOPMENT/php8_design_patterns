<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Mediator;

class AllUpperColleague extends FormatColleague {
	
	/* 
	   note that enum could be used since $state is only going to take 2 values, 
 	   namely 'all_first_upper' or  'only_first_upper'
	   https://www.php.net/manual/en/language.types.enumerations.php
	*/
    protected string $state;

	public function __construct(		
		protected string $text,
		parent::__construct(FormatMediator $formatMediator)
	) {}

	protected function setTxt(string $textInput):void
	{
		$this->text = $textInput;
	}
    
	protected function getTxt():string 
	{
		return $this->text;
	}

	protected  function setState(string $stateInput):void
	{
		$this->state = $stateInput;
	}

    protected function getState():string  
	{
		return $this->state;
	}

    protected function setAllFirstUpperCase():void 
	{
    	$this->setTxt(textInput:ucwords($this->getTxt()));
      	$this->setState(stateInput:'all_first_upper');
      	$this->getMediator()->change(FormatColleague:$this);
    }

    protected function setOnlyFirstUpperCase():void 
	{
    	$this->setTxt(textInput:ucfirst($this->getTxt()));
      	$this->setState(stateInput:'only_first_upper');
      	$this->getMediator()->change(FormatColleague:$this);
    }
}
