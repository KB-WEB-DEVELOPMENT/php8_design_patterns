<?php

namespace php8_design_patterns\Behavioral\Observer;

class Observer implements ObserverInterface {

  public function __construct(
	private int $id
  ){}
	
  public function update(SubjectInterface $subject):string
  {
    echo 'Observer {$this->id} notified with new state: {$subject->getState()}.' . '<br/>';
  }
}
