<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Factory\Tests;

use php8_design_patterns\Creational\Factory\WindowsShellCommandCreator;
use php8_design_patterns\Creational\Factory\LinuxShellCommandCreator;
use php8_design_patterns\Creational\Factory\WindowsShellCommandFactory;
use php8_design_patterns\Creational\Factory\LinuxShellCommandFactory;

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{

	public function testCanCreateWindowsShellCommandCreator():void
	{
		$windowsShellCommandFactory = new WindowsShellCommandFactory();
		$windowsShellCommandCreator = $windowsShellCommandFactory->createShellCommandCreator();

		$this->assertInstanceOf(WindowsShellCommandCreator::class,$windowsShellCommandCreator);
	}

	public function testCanCreateLinuxShellCommandCreator():void
	{

		$linuxShellCommandFactory = new LinuxShellCommandFactory());
		$linuxShellCommandCreator = $linuxShellCommandFactory->createShellCommandCreator();

		$this->assertInstanceOf(LinuxShellCommandCreator::class,$linuxShellCommandCreator);
	}
	
	public function testAllCommandsWork():void
	{
		$w = new WindowsShellCommandCreator();
		$l = new LinuxShellCommandCreator();
		
		$winRes = [];
		
		$winRes[] = $w->copyFile(filename:"test1.php",filepath:"C:/somepath");
		$winRes[] = $w->renameFile(old_filename:"test2.php",new_filename:"test3.php");
		$winRes[] = $w->compareFiles(filename1:"test4.php",filename2:"test5.php");
		
		$linRes = [];
		
		$linRes[] = $l->copyFile(filename:"test1.php",filepath:"/home/somepath");
		$linRes[] = $l->renameFile(old_filename:"test2.php",new_filename:"test3.php");
		$linRes[] = $l->compareFiles(filename1:"test4.php",filename2:"test5.php");
		
		$winExp = ['copy test1.php C:/somepath','rn test2.php test3.php','fc test4.php test5.php'];
		
		$linExp = ['cp test1.php /home/somepath','mv test2.php test3.php','diff test4.php test5.php'];
		
		$this->assertSame($winRes,$winExp);
		
		$this->assertSame($linRes,$linExp);		
	}
}
