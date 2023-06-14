<?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Adapter;

class WindowsToLinuxAdapter extends LinuxCommandsAnalyzer {
 
    public function __construct() 
    {
        private LinuxCommandsAnalyzer $linuxCommandsAnalyzer;
    }
 

    public  function convert(string $command):void 
    {
        $this->linuxCommandsAnalyzer->getLinuxCommand(command:$command);        
    }  
}
