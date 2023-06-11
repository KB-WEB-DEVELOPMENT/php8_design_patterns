<?php

namespace php8_design_patterns\Behavioral\Observer;

class Observer implements ObserverInterface {
	
  private int $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function update(SubjectInterface $subject):string
  {
    echo 'Observer {$this->id} notified with new state: {$subject->getState()}.' . '<br/>';
  }
}