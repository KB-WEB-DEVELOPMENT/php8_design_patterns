<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Iterator;

class Student
{	
	public function __construct(
		private string $name,
		private int $ranking
	){}
	
	public function getStudentInfos(): string 
	  {
        return 'Name:' . $this->name . ' , Ranking:' . $this->ranking;
    }
}
