<?php

namespace php8_design_patterns\Behavioral\Observer;

interface SubjectInterface {
	
  public function attach(ObserverInterface $observer):void;
  
  public function detach(ObserverInterface $observer):bool;
  
  public function notify():void;

}

