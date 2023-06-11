<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Proxy;

class  FilesReader implements FilesReaderLib
{
	
	private bool $fileLocation = true;
	private array $fileInfosArray = [];
	
	public function __construct(
		private string $filename
	){}
		
	public function isLocalFile(): bool
	{
		  
		 $this->fileLocation = false;
		 
		 $docRootPath = $_SERVER['DOCUMENT_ROOT'];
		 
		 $directory = new \RecursiveDirectoryIterator($docRootPath);
		 $iterator  = new \RecursiveIteratorIterator($directory);

		foreach ($iterator as $info) {

			if ($info->getFilename() == $this->filename) {
				
				   $this->fileLocation = true;
			    
				   break;
			}
		}
		
		return $this->fileLocation;
	}
	
	public function isReadableFile(): bool
	{					
		return is_readable($this->filename);
	}	
	
	public function getFileInfos(): array
	{
		$this->fileInfosArray = pathinfo($this->filename);
		$this->fileInfosArray["filesize"] = filesize($this->filename); 

		return $this->fileInfosArray;
	}	
	
	public function copyRemoteFile(): bool
	{
		
		$remote_file_contents = (file_get_contents($this->filename) !== false) ? file_get_contents($this->filename) : null; 	
		
		$url = (parse_url($this->filename) !== false) ? parse_url($this->filename) : null;
		
		$filename = !empty($url) ? pathinfo($url['path'], PATHINFO_FILENAME) : null;
		
		$ext = !empty($url) ? pathinfo($url['path'], PATHINFO_EXTENSION) : null;
				
		$local_file_path = !empty($filename && $ext) ? basename(__DIR__) . $filename . $ext : null;
		
		if (!empty($remote_file_contents && $local_file_path)) {
			
			file_put_contents($local_file_path, $remote_file_contents);
			
			return true;
		
		} else {
			return false;
		 }		
	}		
}
