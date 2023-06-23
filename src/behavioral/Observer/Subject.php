<?php

namespace php8_design_patterns\Behavioral\Observer;

class Subject implements SubjectInterface {
	
  private array $observers = [];
  
  private string $state;

  public function attach(ObserverInterface $observer):void 
  {
	$this->observers[] = $observer;
  }

  public function detach(ObserverInterface $observer): bool
  {
        if (($arrayKey = array_search($observer, $this->observers)) !== false) {
	    unset($this->observers[$arrayKey]);
	    return true;
	} else {
	    return false;
	}
  }

  public function notify():void
  {
      foreach ($this->observers as $observer) {
        $observer->update($this);
      }
  }

  public function setState(string $state):void
  {
	$this->state = $state;
        $this->notify();
  }

  public function getState():string
  {
	return $this->state;
  }
  
}
