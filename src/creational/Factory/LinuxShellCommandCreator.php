<?php

declare(strict_types=1);

namespace php8_design_patterns\Creational\Factory;

class LinuxShellCommandCreator implements ShellCommandCreator
{
	public function copyFile(string $filename, string $filepath):string
	{
		$command = "cp {$filename} {$filepath}";

        return $command;
	}
	
	public function renameFile(string $old_filename, string $new_filename):string
	{
		$command = "mv {$old_filename} {$new_$filename}";

        return $command;
	}

	public function compareFiles(string $filename1, string $filename2):string
	{
		$command = "diff {$filename1} {$filename2}";

        return $command;				
	}
}
