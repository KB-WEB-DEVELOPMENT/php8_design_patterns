<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Adapter;

class LinuxCommandsAnalyzer 
{

	public function getLinuxCommand(string $command):string 
	{
		$commandInfos = match($command) {
			"Rename" => 'mv | Example: mv fileold.txt filenew.txt',
			"Copy" => 'cp | Example: cp file.txt /home/foldercopy',
			"Move" => 'mv | Example: mv file.txt /home/newfolder',
			"Delete" => 'rm | Example: rm deleteme.txt',
			"Find" => 'grep | Example: grep test file1.txt',
		};
	
		return $commandInfos;
	
	}

}