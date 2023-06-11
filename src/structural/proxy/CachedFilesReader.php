<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Proxy;

class CachedFilesReader implements FilesReaderLib
{

    private array $cachedFiles = [ 'file1.php', 'file2.php', 'file3.php' ];
	private array $fileInfosArray = [];
	
	public function __construct(
		private string $filename
		protected FilesReader $filesReader
	){}
			
	public function getFileInfos(): array
	{
		
		if (in_array($this->filename,$this->cachedFiles)) {

			$this->fileInfosArray = pathinfo($this->filename);
			$this->fileInfosArray["filesize"] = filesize($this->filename);
			
		}  else {

				if (($filesReader->isLocalFile() === true) && ($filesReader->isReadableFile() === true)) {
					
						$this->fileInfosArray =  $filesReader->getFileInfos();
										
				}  elseif (($filesReader->isLocalFile() === false) && ($filesReader->isReadableFile() === true)) {	
				
						$this->fileInfosArray =  $filesReader->copyRemoteFile() ? $filesReader->getFileInfos() : [];		
							 					
		          } else {

					  $this->fileInfosArray = [];
			      }
			
	       }
		
		return $this->fileInfosArray;
	}

}	