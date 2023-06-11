<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Adapter\Tests;

use php8_design_patterns\Structural\Adapter\LinuxCommandsAnalyzer;
use php8_design_patterns\Structural\Adapter\WindowsCommandsAnalyzer;
use php8_design_patterns\Structural\Adapter\WindowsToLinuxAdapter;
use php8_design_patterns\Structural\Adapter\App;

use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
	
	public function testCanGetWindowsCommandInfos:void
	{

        $str = 'ren | Example: ren file1.txt file2.txt';
		$w = new WindowsCommandsAnalyzer();
		$infos = $w->getWindowsCommand(command: "Rename");

		$this->assertSame($infos,$str);
	}

	public function testCanGetLinuxCommandInfos:void
	{
        $str = 'mv | Example: mv fileold.txt filenew.txt';
		$w = new LinuxCommandsAnalyzer();
		$infos = $w->getLinuxCommand(command: "Rename");

		$this->assertSame($infos,$str);
	}
	
	public function testCanConvertCommandInfos:void
	{
		$app = new App(new WindowsCommandsAnalyzer);
		
		$str1 = $app->getCommand(command: "Find");
		
		$app->setConverter(WindowsToLinuxAdapter: new WindowsToLinuxAdapter);
		
		$str2 = $app->convertCommand(command: "Find");
		
		$this->assertSame($str1,'find | Example: find "test" 123.txt');
		$this->assertSame($str2,'grep | Example: grep test file1.txt');		
	}

}
