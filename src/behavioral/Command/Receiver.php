<?php

declare(strict_types=1);

namespace php8_design_patterns\Behavioral\Command;

class Receiver
{
	private bool $enableDateConfig = true;
	
	public function __construct(
		private string $firstname
		private array  $dateConfig
	) {}
	
	public function printMessage():string
	{		
		if ($this->enableDateConfig == true && !empty($this->dateConfig)) {
		
			$datefmt = datefmt_create(
							locale_get_default(),
							\IntlDateFormatter:: . $this->dateConfig['dateType'],
							\IntlDateFormatter:: . $this->dateConfig['timeType'],
							date_default_timezone_get(),
							\IntlDateFormatter:: . $this->dateConfig['calendar'],
					   );

			$str = 'Hi ' . $this->firstname . ', it is ' . datefmt_format($datefmt, time()) . '.';

		} else {
			
			$dt = new DateTime();
			
			$str = 'Hi ' . $this->firstname . ', it is ' . $dt->format('d-m-Y H:i:s'). '.';
		}
		
		return $str;
	
	}

	public function enableDateConfig():void
	{
		$this->enableDateConfig = true;
	}	

	public function disableDateConfig():void
	{
		$this->enableDateConfig = false;
	}
}