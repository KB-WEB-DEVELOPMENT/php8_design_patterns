<?php

namespace php8_design_patterns\Behavioral\Observer;

interface ObserverInterface {
	
  public function update(SubjectInterface $subject):string;

}