<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Iterator;

class StudentsList {
	
    private array $studentsArray = [];
    
	public function getStudent(int $arrayIndex): array|bool
	{      
	     $student =  is_array($this->studentsArray[$arrayIndex]) ? $this->studentsArray[$arrayIndex] : false;
	  
	     return $student;		  
    }
    
	public function addStudent(Student $newStudent): bool
	{
		$arrayIndex = key(end($this->studentsArray)) + 1;
	  
		$this->studentsArray[$arrayIndex] = $newStudent;
	  
		$res = ($this->studentsArray[$arrayIndex] == end($this->studentsArray)) ? true : false;
	  
		return $res;
        }
    
	public function removeStudent(Student $studentToDelete): bool
	{
		$studentName = $studentToDelete->name;

		$arrayIndex =  array_search($studentName, array_column($this->studentsArray,'name'));

        if (!is_bool($arrayIndex)) {
			
			unset($this->studentsArray[$arrayIndex]);
			
			$this->studentsArray = array_values($this->studentsArray); 
		
			return true;		
		}	

		return false;
    }
	
	public function countStudents(): int
	{
		return count($this->studentsArray);
	}
}
