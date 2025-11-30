<?php
declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Iterator\Tests;

use php8_design_patterns\Behavioral\Iterator\Student;
use php8_design_patterns\Behavioral\Iterator\StudentsList;
use php8_design_patterns\Behavioral\Iterator\StudentsListForwardIterator;
use php8_design_patterns\Behavioral\Iterator\StudentsListBackwardIterator;

use PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase
{
	
	public function testCanIterateAfterAdding():void
	{	
		$newStudent1 = new Student(name:'John1 Doe1',ranking:24);
		$newStudent2 = new Student(name:'John2 Doe2',ranking:16);
		$newStudent3 = new Student(name:'John3 Doe3',ranking:3);
		
		$studentsList = new StudentsList();
		
        $studentsList->addStudent(Student:$newStudent1);
		$studentsList->addStudent(Student:$newStudent2);
		$studentsList->addStudent(Student:$newStudent3);
		
		$studentsInfosArray = [];
		
		foreach ($studentsList as $s) {			
			$studentsInfosArray[] = $s->getStudentInfos();			
		}

		$exp_arr = ['Name:John1 Doe1 , Ranking:24','Name:John2 Doe2 , Ranking:16','Name:John3 Doe3 , Ranking:3'];

		$this->assertSame($exp_arr,$studentsInfosArray);	
	}

	public function testCanIterateAfterRemoving():void
	{
		$newStudent1 = new Student(name:'John1 Doe1',ranking:24);
		$newStudent2 = new Student(name:'John2 Doe2',ranking:16);
		
		$studentsList = new StudentsList();
		
        $studentsList->addStudent(Student:$newStudent1);
		$studentsList->addStudent(Student:$newStudent2);
		
		$studentsList->removeStudent(Student:$newStudent1);
		
		$studentsInfosArray = [];
		
		foreach ($studentsList as $s) {			
			$studentsInfosArray[] = $s->getStudentInfos();			
		}
		
		$exp_arr = ['Name:John2 Doe2 , Ranking:16'];
		
		$this->assertSame($exp_arr,$studentsInfosArray);
		
    }
	
	public function testCanGetNextStudent():void
	{
		$newStudent1 = new Student(name:'John1 Doe1',ranking:24);
		$newStudent2 = new Student(name:'John2 Doe2',ranking:16);
		
		$studentsList = new StudentsList();
		
        $studentsList->addStudent(Student:$newStudent1);
		
		$it = new StudentsListForwardIterator(StudentsList:$studentsList);
		
		$sl1 = $it->getCurrentStudent();
		
		$studentsList->addStudent(Student:$newStudent2);
		
		$sl2 = $it->getNextStudent();
		
		$arrayIndex = (int)$it->currentArrayIndex;
		
		$nextStudent = $sl2->getStudent(arrayIndex:$arrayIndex);
		
		$res = $nextStudent->getStudentInfos();

		$exp = 'Name:John2 Doe2 , Ranking:16'; 	

		$this->assertSame($exp,$res);
			
	}

    public function testCanGetPreviousStudent():void
	{
		$newStudent1 = new Student(name:'John1 Doe1',ranking:24);
		$newStudent2 = new Student(name:'John2 Doe2',ranking:16);
		
		$studentsList = new StudentsList();
        $studentsList->addStudent(Student:$newStudent1);
		$studentsList->addStudent(Student:$newStudent2);
		
		$it = new StudentsListBackwardIterator(StudentsList:$studentsList);
		
		$sl1 = $it->getCurrentStudent();
		$sl2 = $it->getNextStudent();
		
		$arrayIndex = (int)$it->currentArrayIndex;
		
		$previousStudent = $sl2->getStudent(arrayIndex:$arrayIndex);
		
		$res = $previousStudent->getStudentInfos();
		
		$exp = 'Name:John1 Doe1 , Ranking:24'; 	

		$this->assertSame($exp,$res);		
    }	
}
