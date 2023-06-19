<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Iterator;

class StudentsListForwardIterator 
{	
    protected int $currentArrayIndex = 0;

    public function __construct(
		protected StudentsList $studentsList	
	){}
	
	public function getCurrentStudent(): object|null
	{
        
                $res = array_key_exists($this->currentArrayIndex,$this->studentsList) ? $this->studentsList[$this->currentArrayIndex] : null;
				   
		return $res;               		
	}	

	public function getNextStudent(): object|null
	{
		 $res =  array_key_exists(++$this->currentArrayIndex,$this->studentsList) ? $this->studentsList[++$this->currentArrayIndex] : null;
	
		 return $res;
	}

}
