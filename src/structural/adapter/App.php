<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Adapter;

class App 
{
    
  public function __construct(
      private object $windowsCommandsAnalyzerObj,
  ){}
	
  public function getCommand(string $command):string 
  {  
	  $this->windowsCommandsAnalyzerObj = new WindowsCommandsAnalyzer();
	
	  $commandInfos = $this->windowsCommandsAnalyzerObj->getWindowsCommand(command:$command);
    
	  return $commandInfos;
  }	
 
  public function setConverter(WindowsToLinuxAdapter $adapter):void 
  {
	  $this->windowsCommandsAnalyzerObj = $adapter;
  }
 	
  public function convertCommand(string $command):void 
  {
	  $this->windowsCommandsAnalyzerObj->convert(command:$command);
  }
			
}
