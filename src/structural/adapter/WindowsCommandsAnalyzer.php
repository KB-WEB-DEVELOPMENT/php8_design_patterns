<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Adapter;

class WindowsCommandsAnalyzer 
{

	public function getWindowsCommand(string $command):string 
	{		
		$commandInfos = match($command) {
			"Rename" => 'ren | Example: ren file1.txt file2.txt',
			"Copy" => 'copy | Example: copy file1.txt C:/foldercopy',
			"Move" => 'move | Example: move file1.txt C:/newfolder',
			"Delete" => 'del | Example: del deleteme.txt',
			"Find" => 'find | Example: find "test" 123.txt',
		};
		
		return $commandInfos;
		
	}
}