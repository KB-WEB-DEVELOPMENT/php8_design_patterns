<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Factory;

interface ShellCommandCreator
{
	public function copyFile(string $filename, string $filepath):string;
	
	public function renameFile(string $old_filename, string $new_filename):string;

	public function compareFiles(string $filename1, string $filename2):string;
}